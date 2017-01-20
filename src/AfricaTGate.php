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
     * @var null
     */
    private $from = null;


    /**
     * ATGateClass constructor.
     * @param Config $config_handler
     * @throws \Exception
     * @internal param $username
     * @internal param $api_key
     */
    public function __construct($config_handler = null)
    {

        // user needs to configure the credentials to use the package
        if ($config_handler['username'] == 'username' || empty($config_handler['api_key'])) {
            throw new \Exception('You need your AfricasTalking username and APIKey for any request to the API.');
        }


        $this->gateway = new AfricasTalkingGateway($config_handler['username'], $config_handler['api_key'], isset($config_handler['environment']) ? $config_handler['environment'] : "production");
    }


    // creator
    public static function at()
    {
        $atg = new AfricaTGate(app('config')->get('atgate'));
        return $atg;
    }

    // sender id chain
    public function from($from)
    {
        $this->from = $from;
        return $this;
    }


    // trigger
    public function sendSMS($to, $message)
    {

        try {
            $results = $this->gateway->sendMessage($to, $message, $this->from);

            return $results[0];
        } catch (AfricasTalkingGatewayException $africasTalkingGatewayException) {
            echo "Encountered an error while sending: " . $africasTalkingGatewayException->getMessage();
        }
    }


    // trigger
    public function sendAirTime($to, $amount)
    {

    }

}