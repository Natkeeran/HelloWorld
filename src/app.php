<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__.'/../vendor/autoload.php';

//use Islandora\Crayfish\Commons\Provider\IslandoraServiceProvider;
use Islandora\Crayfish\Commons\Provider\YamlConfigServiceProvider;
use Islandora\Helloworld\Controller\HelloworldController;
use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

$app['debug'] = true;

$app = new Application();

$app->register(new YamlConfigServiceProvider(__DIR__ . '/../cfg/config.yaml'));

// Register the Log service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => '/var/log/islandora/test2.log',
));

// Register the Service Controller - https://silex.symfony.com/doc/2.0/providers/service_controller.html
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app['helloworld.controller'] = function ($app) {
    return new HelloworldController();
};

$app->get('/sayYo', "helloworld.controller:sayYo");

$app->get('/sayHello', function () {
  $bb = new HelloworldController();
  $mm = $bb->sayYo();

  return "Hello World" . $mm;
});

return $app;
