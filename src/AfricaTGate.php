<?php
/**
 * Created by PhpStorm.
 * User: Lawrence
 * Date: 1/12/17
 * Time: 4:00 PM
 */

namespace Mobidev\ATGate;

use Illuminate\Contracts\Config\Repository as Config;

use Mobidev\ATGate\AfricasTalkingGateway\AfricasTalkingGateway;
use Mobidev\ATGate\AfricasTalkingGateway\AfricasTalkingGatewayException;

class AfricaTGate
{

    /**
     * @var AfricasTalkingGateway
     */
    protected $gateway;



    /**
     * ATGateClass constructor.
     * @param Config $config_handler
     * @throws \Exception
     * @internal param $username
     * @internal param $api_key
     */
    public function __construct($config_handler)
    {

        // user needs to configure the credentials to use the package
        if ($config_handler['username'] == 'username' && $config_handler['api_key'] == null) {
            throw new \Exception('You need your AfricasTalking username and APIKey for any request to the API.');
        }


        $this->gateway = new AfricasTalkingGateway($config_handler['username'], $config_handler['api_key']);
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
            echo "Encountered an error while sending: " . $africasTalkingGatewayException->getMessage();
        }
    }


}