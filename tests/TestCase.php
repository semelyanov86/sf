<?php

namespace Tests;

use Domains\Users\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn()
    {
        $this->actingAs(User::first());
        return $this;
    }
}
