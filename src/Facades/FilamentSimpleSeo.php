<?php

namespace Dovaldev\FilamentSimpleSeo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dovaldev\FilamentSimpleSeo\FilamentSimpleSeo
 */
class FilamentSimpleSeo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Dovaldev\FilamentSimpleSeo\FilamentSimpleSeo::class;
    }
}
