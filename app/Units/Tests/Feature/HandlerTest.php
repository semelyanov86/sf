<?php

namespace Units\Tests\Feature;


use App\Exceptions\Handler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Testing\TestResponse;
use Parents\Tests\PhpUnit\ApiTestCase;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HandlerTest extends ApiTestCase
{
    public function testConvertExceptionIntoAJsonApiSpec(): void
    {
        /** @var Handler $handler */
        $handler = app(Handler::class);
        $request = Request::create('/test', 'GET');
        $request->headers->set('accept', 'application/vnd.api+json');
        $exception = new \Exception('Test exception');
        $response = $handler->render($request, $exception);
        TestResponse::fromBaseResponse($response)->assertJson([
            'errors' => [
                [
                    'title' => 'Exception',
                    'details' => 'Test exception'
                ]
            ]
        ])->assertStatus(500);
    }

    public function testConvertsAnHttpExceptionIntoAJsonApiSpec(): void
    {
        /** @var Handler $handler */
        $handler = app(Handler::class);
        $request = Request::create('/test', 'GET');
        $request->headers->set('accept', 'application/vnd.api+json');
        $exception = new HttpException(404, 'Not Found');
        $response = $handler->render($request, $exception);
        TestResponse::fromBaseResponse($response)->assertJson([
            'errors' => [
                [
                    'title' => 'Http Exception',
                    'details' => 'Not Found'
                ]
            ]
        ])->assertStatus(404);
    }

    public function testConvertsAnUnauthenticatedExceptionIntoAJsonApiSpec(): void
    {
        /** @var Handler $handler */
        $handler = app(Handler::class);
        $request = Request::create('/test', 'GET');
        $request->headers->set('accept', 'application/vnd.api+json');
        $exception = new AuthenticationException();
        $response = $handler->render($request, $exception);
        TestResponse::fromBaseResponse($response)->assertJson([
            'errors' => [
                [
                    'title' => 'Unauthenticated',
                    'details' => 'You are not authenticated'
                ]
            ]
        ]);
    }
}
