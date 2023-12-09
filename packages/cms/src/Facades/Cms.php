<?php

namespace Hup234design\Cms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hup234design\Cms\Cms
 */
class Cms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Hup234design\Cms\Cms::class;
    }
}
