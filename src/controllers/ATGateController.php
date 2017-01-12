<?php

namespace Mobidev\ATGate\controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Mobidev\ATGate\AfricasTalkingGateway\AfricasTalkingGateway;

class ATGateController extends BaseController
{

    protected $gateway;


    /**
     * ATGateController constructor.
     */
    public function __construct()
    {

        if (config('username') == 'username' && config('api_key') == null){
            throw new \Exception('You need your AfricasTalking username and APIKey for any request to the API.');
        }

        $this->gateway = new AfricasTalkingGateway(config('username'), config('api_key'), config('from'));

    }

    public static function sendSMS($to, $message)
    {

    }
}
