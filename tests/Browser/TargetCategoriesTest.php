<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TargetCategoriesTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin = \Domains\Users\Models\User::find(1);
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
            $browser->visit(route('admin.targetcategories.index'));
            $browser->assertRouteIs('admin.targetcategories.index');
        });
    }
}
