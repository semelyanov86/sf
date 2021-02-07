<?php

namespace Parents\Controllers;


use Illuminate\Http\JsonResponse;
use ReflectionClass;
use Request;

/**
 * Class ApiController.
 *
 */
abstract class ApiController extends Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="SimpleFinance OpenApi Documentation",
     *      description="Documentation about API of Sumple Finance App",
     *      @OA\Contact(
     *          email="se@sergeyem.ru"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo SimpleFinance server"
     * )

     *
     * @OA\Tag(
     *     name="Users",
     *     description="API Endpoints of Users"
     * )
     * @OA\Tag(
     *     name="Teams",
     *     description="Everything about your Teams",
     *     @OA\ExternalDocumentation(
     *         description="Find out more",
     *         url="http://swagger.io"
     *     )
     * )
     * @OA\Tag(
     *     name="Permissions",
     *     description="All permissions in your system",
     *     @OA\ExternalDocumentation(
     *         description="Find out more",
     *         url="http://swagger.io"
     *     )
     * )
     * @OA\Tag(
     *     name="Roles",
     *     description="All roles in your system",
     *     @OA\ExternalDocumentation(
     *         description="Find out more",
     *         url="http://swagger.io"
     *     )
     * )
     * @OA\Tag(
     *     name="Countries",
     *     description="All countries added to system",
     *     @OA\ExternalDocumentation(
     *         description="Find out more",
     *         url="http://swagger.io"
     *     )
     * )
     * @OA\Tag(
     *     name="Currencies",
     *     description="All currencies added to system",
     *     @OA\ExternalDocumentation(
     *         description="Центральный банк России",
     *         url="https://cbr.ru"
     *     )
     * )
     * @OA\Tag(
     *     name="CardTypes",
     *     description="All card types added to system",
     * )
     * @OA\Tag(
     *     name="AutoBrands",
     *     description="All auto brands added to system",
     * )
     * @OA\Tag(
     *     name="Banks",
     *     description="All banks added to system",
     * )
     * @OA\Tag(
     *     name="TargetCategories",
     *     description="All Target Categories added to system",
     * )
     * @OA\Tag(
     *     name="Categories",
     *     description="All Categories added to system",
     * )
     */
    /**
     * @var  array
     */
    protected array $metaData = [];

    /**
     * The type of this controller. This will be accessible mirrored in the Actions.
     * Giving each Action the ability to modify it's internal business logic based on the UI type that called it.
     *
     * @var  string
     */
    public string $ui = 'api';


    /**
     * @param $data
     *
     * @return  $this
     */
    public function withMeta($data)
    {
        $this->metaData = $data;

        return $this;
    }
    /**
     * @param       $message
     * @param int   $status
     * @param array $headers
     * @param int   $options
     *
     * @return  JsonResponse
     */
    public function json($message, $status = 200, array $headers = [], $options = 0)
    {
        return new JsonResponse($message, $status, $headers, $options);
    }
    /**
     * @param null  $message
     * @param int   $status
     * @param array $headers
     * @param int   $options
     *
     * @return JsonResponse
     */
    public function created($message = null, $status = 201, array $headers = [], $options = 0)
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    /**
     * @param  null|string[]  $message
     *
     * @param  int  $status
     * @param  array  $headers
     * @param  int  $options
     * @return JsonResponse
     */
    public function accepted(?array $message = null, $status = 202, array $headers = [], $options = 0)
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    /**
     * @param $responseArray
     *
     * @return  JsonResponse
     */
    public function deleted($responseArray = null)
    {
        if (!$responseArray) {
            return $this->accepted();
        }

        $id = $responseArray->getHashedKey();
        $className = (new ReflectionClass($responseArray))->getShortName();

        return $this->accepted([
            'message' => "$className ($id) Deleted Successfully.",
        ]);
    }

    /**
     * @param int $status
     *
     * @return  JsonResponse
     */
    public function noContent($status = 204)
    {
        return new JsonResponse(null, $status);
    }


    /**
     * @param array $responseArray
     * @param array $filters
     *
     * @return array
     */
    private function filterResponse(array $responseArray, array $filters)
    {
        foreach ($responseArray as $k => $v) {
            if (in_array($k, $filters, true)) {
                // we have found our element - so continue with the next one
                continue;
            }

            if (is_array($v)) {
                // it is an array - so go one step deeper
                $v = $this->filterResponse($v, $filters);
                if (empty($v)) {
                    // it is an empty array - delete the key as well
                    unset($responseArray[$k]);
                } else {
                    $responseArray[$k] = $v;
                }
                continue;
            } else {
                // check if the array is not in our filter-list
                if (!in_array($k, $filters)) {
                    unset($responseArray[$k]);
                    continue;
                }
            }
        }

        return $responseArray;
    }

    /**
     * @return array
     */
    protected function parseRequestedIncludes() : array
    {
        return explode(',', Request::get('include'));
    }
}
