<?php

namespace Parents\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as LaravelModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Parents\Traits\HasResourceKeyTrait;

abstract class Model extends LaravelModel
{
    use HasFactory, SoftDeletes, HasResourceKeyTrait;
}
