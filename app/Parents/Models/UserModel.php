<?php


namespace Parents\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

abstract class UserModel extends \Illuminate\Foundation\Auth\User
{
    use SoftDeletes, Notifiable, HasFactory;
}
