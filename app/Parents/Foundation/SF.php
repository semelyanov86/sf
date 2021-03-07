<?php
declare(strict_types=1);

namespace Parents\Foundation;

use Parents\Exceptions\ClassDoesNotExistException;
use Parents\Exceptions\MissingContainerException;
use Parents\Exceptions\WrongConfigurationsException;
use Parents\Traits\CallableTrait;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

/**
 * Class SF
 *
 * Helper Class to serve SF (Ship/Containers).
 *
 */
class SF
{
    use CallableTrait;

    /**
     * The SF version.
     *
     * @var string
     */
    const VERSION = '9.0.0';

    /**
     * Get the containers namespace value from the containers config file
     *
     * @return  string
     */
    public function getContainersNamespace(): string
    {
        return Config::get('simplefinance.containers.namespace');
    }

    /**
     * Get the containers names
     *
     * @return  array
     */
    public function getContainersNames(): array
    {
        $containersNames = [];

        foreach ($this->getContainersPaths() as $containersPath) {
            $containersNames[] = basename($containersPath);
        }

        return $containersNames;
    }

    /**
     * Get the port folders names
     *
     * @return  array
     */
    public function getShipFoldersNames(): array
    {
        $portFoldersNames = [];

        foreach ($this->getShipPath() as $portFoldersPath) {
            $portFoldersNames[] = basename($portFoldersPath);
        }

        return $portFoldersNames;
    }

    /**
     * get containers directories paths
     *
     * @return  array
     */
    public function getContainersPaths(): array
    {
        return File::directories(app_path('Containers'));
    }

    /**
     * @return  array
     */
    public function getShipPath(): array
    {
        return File::directories(app_path('Ship'));
    }

    /**
     * build and return an object of a class from its file path
     *
     * @param $filePathName
     *
     * @return  object
     */
    public function getClassObjectFromFile(string $filePathName): object
    {
        $classString = $this->getClassFullNameFromFile($filePathName);

        $object = new $classString;

        return $object;
    }

    /**
     * get the full name (name \ namespace) of a class from its file path
     * result example: (string) "I\Am\The\Namespace\Of\This\Class"
     *
     * @param $filePathName
     *
     * @return  string
     */
    public function getClassFullNameFromFile(string $filePathName): string
    {
        return $this->getClassNamespaceFromFile($filePathName) . '\\' . $this->getClassNameFromFile($filePathName);
    }

    /**
     * get the class namespace form file path using token
     *
     * @param $filePathName
     *
     * @return  null|string
     */
    protected function getClassNamespaceFromFile(string $filePathName): ?string
    {
        $src = file_get_contents($filePathName);

        $tokens = token_get_all($src);
        $count = count($tokens);
        $i = 0;
        $namespace = '';
        $namespace_ok = false;
        while ($i < $count) {
            $token = $tokens[$i];
            if (is_array($token) && $token[0] === T_NAMESPACE) {
                // Found namespace declaration
                while (++$i < $count) {
                    if ($tokens[$i] === ';') {
                        $namespace_ok = true;
                        $namespace = trim($namespace);
                        break;
                    }
                    $namespace .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                }
                break;
            }
            $i++;
        }
        if (!$namespace_ok) {
            return null;
        } else {
            return $namespace;
        }
    }

    /**
     * get the class name form file path using token
     *
     * @param $filePathName
     *
     * @return  mixed
     */
    protected function getClassNameFromFile(string $filePathName): string
    {
        $php_code = file_get_contents($filePathName);

        $classes = [];
        $tokens = token_get_all($php_code);
        $count = count($tokens);
        for ($i = 2; $i < $count; $i++) {
            if ($tokens[$i - 2][0] == T_CLASS
                && $tokens[$i - 1][0] == T_WHITESPACE
                && $tokens[$i][0] == T_STRING
            ) {

                $class_name = $tokens[$i][1];
                $classes[] = $class_name;
            }
        }

        return $classes[0];
    }

    /**
     * check if a word starts with another word
     *
     * @param $word
     * @param $startsWith
     *
     * @return  bool
     */
    public function stringStartsWith(string $word, string $startsWith): bool
    {
        return (substr($word, 0, strlen($startsWith)) === $startsWith);
    }

    /**
     * @param        $word
     * @param string $splitter
     * @param bool   $uppercase
     *
     * @return  string
     */
    public function uncamelize(string $word, string $splitter = " ", bool $uppercase = true): string
    {
        $word = preg_replace('/(?!^)[[:upper:]][[:lower:]]/', '$0',
            preg_replace('/(?!^)[[:upper:]]+/', $splitter . '$0', $word));

        return $uppercase ? ucwords($word) : $word;
    }

    /**
     * @return mixed
     * @throws WrongConfigurationsException
     */
    public function getLoginWebPageName(): string
    {
        $loginPage = Config::get('apiato.containers.login-page-url');

        if (is_null($loginPage)) {
            throw new WrongConfigurationsException();
        }

        return $loginPage;
    }


    /**
     * Build namespace for a class in Container.
     *
     * @param $containerName
     * @param $className
     *
     * @return  string
     */
    public function buildClassFullName(string $containerName, string $className): string
    {
        return 'Domains\\' . $containerName . '\\' . $this->getClassType($className) . 's\\' . $className;
    }

    /**
     * Get the last part of a camel case string.
     * Example input = helloDearWorld | returns = World
     *
     * @param $className
     *
     * @return  mixed
     */
    public function getClassType(string $className): string
    {
        $array = preg_split('/(?=[A-Z])/', $className);

        return end($array);
    }

    /**
     * @param $containerName
     *
     * @throws MissingContainerException
     */
    public function verifyContainerExist(string $containerName): bool
    {
        if (!is_dir(app_path('Domains/' . $containerName))) {
            throw new MissingContainerException("Domain ($containerName) is not installed.");
        }
        return true;
    }

    /**
     * @param $className
     *
     * @throws ClassDoesNotExistException
     */
    public function verifyClassExist(string $className): bool
    {
        if (!class_exists($className)) {
            throw new ClassDoesNotExistException("Class ($className) is not installed.");
        }
        return true;
    }

}

