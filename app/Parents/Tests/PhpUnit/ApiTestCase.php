<?php


namespace Parents\Tests\PhpUnit;


use Domains\Users\Models\User;

abstract class ApiTestCase extends TestCase
{
    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::firstOrFail();
    }

    protected function auth()
    {
        $this->actingAs($this->user, 'api');
    }
}
