<?php


namespace Domains\Accounts\Tests\Feature;


use Domains\Accounts\Models\Account;
use Domains\Accounts\Tasks\DeleteAccountTask;
use Domains\Accounts\Tests\Traits\CreateAccountTrait;

/**
 * Class DeleteAccountTaskTest
 * @package Domains\Accounts\Tests\Feature
 * @covers \Domains\Accounts\Tasks\DeleteAccountTask
 */
class DeleteAccountTaskTest extends \Parents\Tests\PhpUnit\ApiTestCase
{
    use CreateAccountTrait;
    /** @test */
    public function test_task_can_delete_account()
    {
        $this->auth();
        $response = $this->create_new_account('Test budget for task');
        $data = $response->json('data');
        $task = app(DeleteAccountTask::class);
        $task->run($data['id']);
        $this->assertSoftDeleted('accounts', [
            'id' => intval($data['id'])
        ]);
        $this->assertSoftDeleted('accounts_extras', [
            'id' => intval($data['id'])
        ]);
    }
}
