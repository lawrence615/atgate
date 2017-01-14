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
     * @var
     */
    protected $username;


    /**
     * @var
     */
    protected $api_key;


    /**
     * @var Config
     */
    protected $config_handler;

    /**
     * ATGateClass constructor.
     * @param Config $config_handler
     * @throws \Exception
     * @internal param $username
     * @internal param $api_key
     */
    public function __construct(Config $config_handler)
    {

        $this->config_handler = $config_handler;


        // user needs to configure the credentials to use the package
        if ($this->config_handler->get('username') == 'username' && $this->config_handler->get('api_key') == null) {
            throw new \Exception('You need your AfricasTalking username and APIKey for any request to the API.');
        }

        echo 'Username: ' . $this->config_handler->get('username');
        echo 'API Key: ' . $this->config_handler->get('api_key');

        $this->gateway = new AfricasTalkingGateway('console','36c9e15bdbe526395151dc62559e64232af66567ea432cd7042a61f95217fc94');
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