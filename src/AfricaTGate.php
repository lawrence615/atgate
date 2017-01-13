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



    public function sendSMS($to, $message)
    {

        // user needs to configure the credentials to use the package
        if (config('username') == 'username' && config('api_key') == null) {
            throw new \Exception('You need your AfricasTalking username and APIKey for any request to the API.');
        }

        $gateway = new AfricasTalkingGateway(config('username'), config('api_key'));


        try {
            $results = $gateway->sendMessage($to, $message);

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