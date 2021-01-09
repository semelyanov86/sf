<?php

namespace Parents\Exceptions;

use Exception as BaseException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\MessageBag;
use Log;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException as SymfonyHttpException;
use Parents\Exceptions\Codes\ErrorCodeManager;

/**
 * Class Exception.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class Exception extends SymfonyHttpException
{

    /**
     * MessageBag errors.
     *
     * @var MessageBag
     */
    protected $errors;

    /**
     * Default status code.
     *
     * @var int
     */
    CONST DEFAULT_STATUS_CODE = Response::HTTP_INTERNAL_SERVER_ERROR;

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var mixed
     */
    private $customData = null;

    /**
     * Status code of error
     * @var int
     */
    protected int $httpStatusCode;

    /**
     * Exception constructor.
     *
     * @param  string|null  $message
     * @param  int|null  $statusCode
     * @param  int  $code
     * @param  ?array  $errors
     * @param  \Exception|null  $previous
     * @param  array  $headers
     */
    public function __construct(
        ?string $message = null,
        ?int $statusCode = null,
        int $code = 0,
        ?array $errors = null,
        BaseException $previous = null,
        $headers = []
    ) {

        // detect and set the running environment
        $this->environment = Config::get('app.env');

        $message = $this->prepareMessage($message);
        $error = $this->prepareError($errors);
        $statusCode = $this->prepareStatusCode($statusCode);
        if (!$statusCode) {
            $statusCode = 200;
        }
        $this->logTheError($statusCode, $message, $code);

        parent::__construct($statusCode, $message, $previous, $headers, $code);

        $this->customData = $this->addCustomData();

        $this->code = $this->evaluateErrorCode();
    }

    /**
     * Help developers debug the error without showing these details to the end user.
     * Usage: `throw (new MyCustomException())->debug($e)`.
     *
     * @param $error
     * @param $force
     *
     * @return $this
     */
    public function debug($error, $force = false)
    {
        if ($error instanceof BaseException) {
            $error = $error->getMessage();
        }

        if ($this->environment != 'testing' || $force === true) {
            Log::error('[DEBUG] ' . $error);
        }

        return $this;
    }

    /**
     * Get the errors message bag.
     *
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Determine if message bag has any errors.
     *
     * @return bool
     */
    public function hasErrors() : bool
    {
        return !$this->errors->isEmpty();
    }

    /**
     * @param  int|null  $statusCode
     * @param  null|string  $message
     *
     * @param  int  $code
     * @return void
     */
    private function logTheError(?int $statusCode, ?string $message, int $code): void
    {
        // if not testing environment, log the error message
        if ($this->environment != 'testing') {
            Log::error('[ERROR] ' .
                'Status Code: ' . $statusCode . ' | ' .
                'Message: ' . $message . ' | ' .
                'Errors: ' . $this->errors . ' | ' .
                'Code: ' . $code
            );
        }
    }

    /**
     * @param ?array $errors
     *
     * @return  MessageBag|array
     */
    private function prepareError(?array $errors = null): array|MessageBag
    {
        return is_null($errors) ? new MessageBag() : $this->prepareArrayError($errors);
    }

    /**
     * @param  array|null  $errors
     *
     * @return  array|MessageBag
     */
    private function prepareArrayError(array|null $errors = []): array|MessageBag
    {
        return is_array($errors) ? new MessageBag($errors) : [];
    }

    /**
     * @param ?string $message
     *
     * @return  ?string
     */
    private function prepareMessage(?string $message = null): ?string
    {
        return is_null($message) && property_exists($this, 'message') ? $this->message : $message;
    }

    /**
     * @param $statusCode
     * @param int|null $statusCode
     *
     * @return ?int
     */
    private function prepareStatusCode(?int $statusCode = null) : ?int
    {
        return is_null($statusCode) ? $this->findStatusCode() : $statusCode;
    }

    /**
     * @return  int
     */
    private function findStatusCode() : int
    {
        return $this->httpStatusCode ?: self::DEFAULT_STATUS_CODE;
    }

    /**
     * @return mixed
     */
    public function getCustomData(): mixed
    {
        return $this->customData;
    }

    /**
     * @return mixed
     */
    protected function addCustomData(): mixed
    {
        $this->customData = null;
        return $this->customData;
    }

    /**
     * Append customData to the exception and return the Exception!
     *
     * @param $customData
     *
     * @return $this
     */
    public function overrideCustomData($customData)
    {
        $this->customData = $customData;
        return $this;
    }

    /**
     * Default value
     *
     * @return int
     */
    public function useErrorCode(): int
    {
        return $this->code;
    }

    /**
     * Overrides the code with the application error code (if set)
     *
     * @return int
     */
    private function evaluateErrorCode(): int
    {
        return $this->useErrorCode();
    }
}
