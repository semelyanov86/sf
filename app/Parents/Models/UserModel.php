<?php


namespace Parents\Models;


use Domains\Users\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

abstract class UserModel extends \Illuminate\Foundation\Auth\User
{
    use SoftDeletes, Notifiable, HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
