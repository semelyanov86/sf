<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccountTypesTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin = \Domains\Users\Models\User::find(1);
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
            $browser->visit(route('admin.accounttypes.index'));
            $browser->assertRouteIs('admin.accounttypes.index');
        });
    }
}
