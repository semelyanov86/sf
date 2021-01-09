<?php

namespace Parents\Traits;

use Parents\Requests\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class CallableTrait.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
trait CallableTrait
{
    public string $ui = 'web';

    /**
     * This function will be called from anywhere (controllers, Actions,..) by the Apiato facade.
     * The $class input will usually be an Action or Task.
     *
     * @param       $class
     * @param array $runMethodArguments
     * @param array $extraMethodsToCall
     *
     * @return  mixed
     * @throws \Exception
     */
    public function call($class, $runMethodArguments = [], $extraMethodsToCall = [])
    {
        $class = $this->resolveClass($class);

        $this->setUIIfExist($class);

        $this->callExtraMethods($class, $extraMethodsToCall);

        return $class->run(...$runMethodArguments);
    }

    /**
     * This function calls another class but wraps it in a DB-Transaction. This might be useful for CREATE / UPDATE / DELETE
     * operations in order to prevent the database from corrupt data. Internally, the regular call() method is used!
     *
     * @param       $class
     * @param array $runMethodArguments
     * @param array $extraMethodsToCall
     *
     * @return mixed
     */
    public function transactionalCall($class, $runMethodArguments = [], $extraMethodsToCall = [])
    {
        return DB::transaction(function() use ($class, $runMethodArguments, $extraMethodsToCall) {
            return $this->call($class, $runMethodArguments, $extraMethodsToCall);
        });
    }

    /**
     * Split containerName@someClass into container name and class name
     *
     * @param        $class
     * @param string $delimiter
     *
     * @return  array
     */
    private function parseClassName($class, $delimiter = '@')
    {
        return explode($delimiter, $class);
    }

    /**
     * If it's apiato Style caller like this: containerName@someClass
     *
     * @param        $class
     * @param string $separator
     *
     * @return  int
     */
    private function needsParsing($class, $separator = '@')
    {
        return preg_match('/' . $separator . '/', $class);
    }

    /**
     * @param $string
     *
     * @return  string
     */
    private function capitalizeFirstLetter($string)
    {
        return ucfirst($string);
    }

    /**
     * $this->ui is coming, should be attached on the parent controller, from where the actions was called.
     * It can be WebController and ApiController. Each of them has ui, to inform the action
     * if it needs to handle the request differently.
     *
     * @param $class
     *
     * @return void
     */
    private function setUIIfExist($class): void
    {
        if (method_exists($class, 'setUI') && property_exists($this, 'ui')) {
            $class->setUI($this->ui);
        }
    }

    /**
     * @param $class
     * @param $extraMethodsToCall
     *
     * @return void
     */
    private function callExtraMethods($class, $extraMethodsToCall): void
    {
        // allows calling other methods in the class before calling the main `run` function.
        foreach ($extraMethodsToCall as $methodInfo) {
            // if is array means it method has arguments
            if (is_array($methodInfo)) {
                $this->callWithArguments($class, $methodInfo);
            } else {
                // if is string means it's just the method name without arguments
                $this->callWithoutArguments($class, $methodInfo);
            }
        }
    }

    /**
     * @param $class
     * @param $methodInfo
     *
     * @return void
     */
    private function callWithArguments($class, $methodInfo): void
    {
        $method = key($methodInfo);
        $arguments = $methodInfo[$method];
        if (method_exists($class, $method)) {
            $class->$method(...$arguments);
        }
    }

    /**
     * @param $class
     * @param $methodInfo
     *
     * @return void
     */
    private function callWithoutArguments($class, $methodInfo): void
    {
        if (method_exists($class, $methodInfo)) {
            $class->$methodInfo();
        }
    }

}
