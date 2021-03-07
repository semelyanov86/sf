<?php


namespace Parents\Foundation\Facades;


class SF extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Parents\Foundation\SF::class;
    }
}
