<?php

namespace Parents\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as LaravelModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Pluralizer;
use Parents\Traits\HasResourceKeyTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

abstract class Model extends LaravelModel
{
    use HasFactory, SoftDeletes, HasResourceKeyTrait;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        $reflect = new \ReflectionClass(new static());
        $resourceKey = Pluralizer::plural($reflect->getShortName());
        $namespace = '\Domains\\' . $resourceKey . '\Factories\\' . $reflect->getShortName() . 'Factory';
        return call_user_func(array($namespace, 'new'));
    }
}
