<?php


namespace Units\Tests\Unit;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Parents\Middlewares\Http\EnsureCorrectApiHeaders;

class EnsureCorrectApiHeadersTest extends \Parents\Tests\PhpUnit\UnitTestCase
{
    public function testAbortsRequestIfAcceptHeaderDoesNotAdhereToJsonApiSpec(): void
    {
        $request = Request::create('/test', 'GET');
        $middleware = new EnsureCorrectApiHeaders();
        $response = $middleware->handle($request, function($request) {
            $this->fail('Did not abort request because of invalid Accept header');
        });
        $this->assertEquals(406, $response->status());
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }

    public function testAcceptsRequestIfAcceptHeaderAdheresToJsonApiSpec(): void
    {
        $request = Request::create('/test', 'GET');
        $request->headers->set('accept', 'application/vnd.api+json');
        $request->headers->set('content-type', 'application/vnd.api+json');
        $middleware = new EnsureCorrectApiHeaders();
        /** @var Response $response */
        $response = $middleware->handle($request, function($request) {
            return new Response();
        });
        $this->assertEquals(200, $response->status());
    }

    public function testAbortsPostRequestIfContentTypeHeaderDoesNotAdhereToJsonApiSpec(): void
    {
        $request = Request::create('/test', 'POST');
        $request->headers->set('accept', 'application/vnd.api+json');
        $middleware = new EnsureCorrectApiHeaders();
        $response = $middleware->handle($request, function($request) {
            $this->fail('Did not abort request because of invalid Content-Type header');
        });
        $this->assertEquals(415, $response->status());
        $this->assertEquals('application/vnd.api+json', $response->headers->get('content-type'));
    }

    public function testAbortsPatchRequestIfContentTypeHeaderDoesNotAdhereToJsonApiSpec(): void
    {
        $request = Request::create('/test', 'PATCH');
        $request->headers->set('accept', 'application/vnd.api+json');
        $middleware = new EnsureCorrectApiHeaders();
        $response = $middleware->handle($request, function($request) {
            $this->fail('Did not abort request because of invalid Content-Type header');
        });
        $this->assertEquals(415, $response->status());
    }

    public function testAcceptsPostRequestIfContentTypeHeaderDoesNotAdhereToJsonApiSpec(): void
    {
        $request = Request::create('/test', 'POST');
        $request->headers->set('accept', 'application/vnd.api+json');
        $request->headers->set('content-type', 'application/vnd.api+json');
        $middleware = new EnsureCorrectApiHeaders();
        /** @var Response $response */
        $response = $middleware->handle($request, function($request) {
            return new Response();
        });
        $this->assertEquals(200, $response->status());
    }

    public function testAcceptsPatchRequestIfContentTypeHeaderDoesNotAdhereToJsonApiSpec(): void
    {
        $request = Request::create('/test', 'POST');
        $request->headers->set('accept', 'application/vnd.api+json');
        $request->headers->set('content-type', 'application/vnd.api+json');
        $middleware = new EnsureCorrectApiHeaders();
        /** @var Response $response */
        $response = $middleware->handle($request, function($request) {
            return new Response();
        });
        $this->assertEquals(200, $response->status());
    }
}
