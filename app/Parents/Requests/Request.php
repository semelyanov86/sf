<?php

namespace Parents\Requests;

use Domains\Users\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Parents\Traits\StateKeeperTrait;
use Illuminate\Foundation\Http\FormRequest as LaravelRequest;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Request
 *
 *
 */
class Request extends LaravelRequest
{

    use StateKeeperTrait;

    /**
     * The transporter to be "casted" to
     *
     * @var null
     */
    protected $transporter = null;

    /**
     * Overriding this function to modify the any user input before
     * applying the validation rules.
     *
     * @param array|mixed|null $keys
     *
     * @return  array
     */
    public function all($keys = null)
    {
        $requestData = parent::all($keys);

        $requestData = $this->mergeUrlParametersWithRequestData($requestData);

        return $requestData;
    }

    /**
     * check if a user has permission to perform an action.
     * User can set multiple permissions (separated with "|") and if the user has
     * any of the permissions, he will be authorize to proceed with this action.
     *
     * @param User|null $user
     *
     * @return  bool
     */
    public function hasAccess(?User $user = null): bool
    {
        // if not in parameters, take from the request object {$this}
        /**
         * @var User
         */
        $user = $user ? : $this->user();

        if ($user && $user->is_admin) {
            return true;
        }

        // check if the user has any role / permission to access the route
        $hasAccess = array_merge(
            $this->hasAnyPermissionAccess($user),
            $this->hasAnyRoleAccess($user)
        );

        // allow access if user has access to any of the defined roles or permissions.
        return empty($hasAccess) ? true : in_array(true, $hasAccess);
    }


    /**
     * To be used mainly from unit tests.
     *
     * @param array                                 $parameters
     * @param User|null $user
     * @param array                                 $cookies
     * @param array                                 $files
     * @param array                                 $server
     *
     * @return  static
     */
    public static function injectData($parameters = [], User $user = null, $cookies = [], $files = [], $server = [])
    {
        // if user is passed, will be returned when asking for the authenticated user using `\Auth::user()`
        if ($user) {
            $app = App::getInstance();
            $app['auth']->guard($driver = 'api')->setUser($user);
            $app['auth']->shouldUse($driver);
        }

        // For now doesn't matter which URI or Method is used.
        $request = parent::create('/', 'GET', $parameters, $cookies, $files, $server);

        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        return $request;
    }


    /**
     * Maps Keys in the Request.
     *
     * For example, ['data.attributes.name' => 'firstname'] would map the field [data][attributes][name] to [firstname].
     * Note that the old value (data.attributes.name) is removed the original request - this method manipulates the request!
     * Be sure you know what you do!
     *
     * @param array $fields
     *
     * @return void
     */
    public function mapInput(array $fields): void
    {
        $data = $this->all();

        foreach ($fields as $oldKey => $newKey) {
            // the key to be mapped does not exist - skip it
            if (!Arr::has($data, $oldKey)) {
                continue;
            }

            // set the new field and remove the old one
            Arr::set($data, $newKey, Arr::get($data, $oldKey));
            Arr::forget($data, $oldKey);
        }

        // overwrite the initial request
        $this->replace($data);
    }

    /**
     * Used from the `authorize` function if the Request class.
     * To call functions and compare their bool responses to determine
     * if the user can proceed with the request or not.
     *
     * @param string $permission
     *
     * @return  bool
     */
    protected function check(string $permission): bool
    {
        return Gate::allows($permission);
    }

    /**
     * apply validation rules to the ID's in the URL, since Laravel
     * doesn't validate them by default!
     *
     * Now you can use validation riles like this: `'id' => 'required|integer|exists:items,id'`
     *
     * @param array $requestData
     *
     * @return  array
     */
    private function mergeUrlParametersWithRequestData(Array $requestData)
    {
        if (isset($this->urlParameters) && !empty($this->urlParameters)) {
            foreach ($this->urlParameters as $param) {
                $requestData[$param] = $this->route($param);
            }
        }

        return $requestData;
    }

    /**
     * @param $user
     *
     * @return  array
     */
    private function hasAnyPermissionAccess(User $user)
    {
        if (!array_key_exists('permissions', $this->access) || !$this->access['permissions']) {
            return [];
        }

        $permissions = is_array($this->access['permissions']) ? $this->access['permissions'] :
            explode('|', $this->access['permissions']);

        $hasAccess = array_map(function ($permission) use ($user) {
            // Note: internal return
            return true;
        }, $permissions);

        return $hasAccess;
    }

    /**
     * @param $user
     *
     * @return  array
     */
    private function hasAnyRoleAccess(User $user)
    {
        if (!array_key_exists('roles', $this->access) || !$this->access['roles']) {
            return [];
        }

        $roles = is_array($this->access['roles']) ? $this->access['roles'] :
            explode('|', $this->access['roles']);

        $hasAccess = array_map(function ($role) use ($user) {
            // Note: internal return
            return true;
        }, $roles);

        return $hasAccess;
    }

    /**
     * This method mimics the $request->input() method but works on the "decoded" values
     *
     * @param $key
     * @param $default
     *
     * @return mixed
     */
    public function getInputByKey($key = null, $default = null)
    {
        return data_get($this->all(), $key, $default);
    }


}
