<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerificationFields extends Migration
{
    public function up()
    {
        Domains\Users\Models\User::all()->each(function (Domains\Users\Models\User $user) {
            $user->update([
                'verified'    => true,
                'verified_at' => now(),
            ]);
        });
    }
}
