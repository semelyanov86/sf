<?php


namespace Parents\Exceptions;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class ClassDoesNotExistException extends \Exception
{
    public $httpStatusCode = SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR;

    public $message = 'Class does not exist.';
}
