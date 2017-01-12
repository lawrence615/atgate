<?php
/**
 * Created by PhpStorm.
 * User: Lawrence
 * Date: 1/12/17
 * Time: 3:57 PM
 */

namespace Mobidev\ATGate\facades;


use Illuminate\Support\Facades\Facade;

class ATGateClassFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ATGate';
    }


}