<?php

namespace Parents\Tests\PhpUnit;

use Domains\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{

    use RefreshDatabase, CreatesApplication;

    public bool $seed = true;
    

    protected function signIn()
    {
        $this->actingAs(User::first());
        return $this;
    }

    /**
     * Setup the test environment, before each test.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Reset the test environment, after each test.
     */
    public function tearDown() : void
    {
        parent::tearDown();
    }


}
