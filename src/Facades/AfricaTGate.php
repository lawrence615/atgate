<?php
/**
 * Created by PhpStorm.
 * User: Lawrence
 * Date: 1/12/17
 * Time: 3:57 PM
 */

namespace Mobidev\ATGate\Facades;


use Illuminate\Support\Facades\Facade;

class AfricaTGate extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'at';
    }
}