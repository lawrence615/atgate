<?php

namespace Mobidev\ATGate\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class AfricaTGate
 * @package Illuminate\Support\Facades
 */
class AfricaTGate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'africatgate';
    }
}