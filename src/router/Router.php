<?php
// core/Router.php
use OpenFeature\OpenFeatureAPI;
use OpenFeature\Providers\Flagd\FlagdProvider;
use OpenFeature\Providers\Flagd\config\HttpConfig;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;

require_once "controllers/UserController.php";

class Router
{
    public static function route($url)
    {
        $api = OpenFeatureAPI::getInstance();
        $httpClient = new Client();
        $httpFactory = new HttpFactory();
        $provider = new FlagdProvider([
            'httpConfig' => new HttpConfig(
                $httpClient,
                $httpFactory,
                $httpFactory,
            ),
            'host' => 'flagd',
            'port' => 8013,
            'secure' => false,
            'protocol' => 'http'
        ]);
          
     
        $api->setProvider($provider);

        
        $client = $api->getClient("hello","");
        $welcomeMessage = $client->getBooleanValue("welcome-message", false);

        if ($welcomeMessage) {
            self::jsonResp($welcomeMessage, 1, "OK");
        } else {
            self::jsonResp($welcomeMessage, 0, "OK");
        }
    }

    public static function jsonResp($data, $code, $message)
    {
        header('Content-Type: application/json');
        $resp = [
            'data' => $data,
            'code' => $code,
            'message' => $message,
        ];
        echo json_encode($resp);
    }
}
