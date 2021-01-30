<?php

namespace Domains\Users\Tests\Feature;

use Parents\Tests\PhpUnit\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHomePage(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
