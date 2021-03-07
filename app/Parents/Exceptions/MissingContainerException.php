<?php


namespace Parents\Exceptions;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class MissingContainerException extends \Exception
{
    public $httpStatusCode = SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR;

    public $message = 'Container not installed.';
}
