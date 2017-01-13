<?php
/**
 * Created by PhpStorm.
 * User: Lawrence
 * Date: 1/12/17
 * Time: 4:00 PM
 */

namespace Mobidev\ATGate;


use Mobidev\ATGate\AfricasTalkingGateway\AfricasTalkingGateway;
use Mobidev\ATGate\AfricasTalkingGateway\AfricasTalkingGatewayException;

class AfricaTGate
{

    protected $gateway;

    /**
     * ATGateClass constructor.
     */
    public function __construct()
    {
        // user needs to configure the credentials to use the package
        if (config('username') == 'username' && config('api_key') == null) {
            throw new \Exception('You need your AfricasTalking username and APIKey for any request to the API.');
        }

        $this->gateway = new AfricasTalkingGateway('console', '36c9e15bdbe526395151dc62559e64232af66567ea432cd7042a61f95217fc94');
    }


    public function sendSMS($to, $message)
    {

        try {
            $results = $this->gateway->sendMessage($to, $message);

            foreach ($results as $result) {
                // status is either "Success" or "error message"
                echo " Number: " . $result->number;
                echo " Status: " . $result->status;
                echo " MessageId: " . $result->messageId;
                echo " Cost: " . $result->cost . "\n";
            }
        } catch (AfricasTalkingGatewayException $africasTalkingGatewayException) {

        }
    }


}