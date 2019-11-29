<?php

namespace Blokks\Services\Support\Facades;

use Illuminate\Support\Facades\Facade;

class KeyCDN extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() 
    { 
        return 'Blokks\Services\KeyCDN'; 
    }
}
