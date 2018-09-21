<?php
require_once __DIR__.'/../vendor/autoload.php';

use Islandora\Crayfish\Commons\Provider\IslandoraServiceProvider;
use Islandora\Crayfish\Commons\Provider\YamlConfigServiceProvider;
use Islandora\Helloworld\Controller\HelloworldController;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

$app['debug'] = true;

$app = new Application();

$app->register(new YamlConfigServiceProvider(__DIR__ . '/../cfg/config.yaml'));

// Use Authorization: Bearer islandora header in your requests
$app->register(new IslandoraServiceProvider());

$app['helloworld.controller'] = function ($app) {
    return new HelloworldController();
};

$app->get('/sayYo', "helloworld.controller:sayYo");

$app->get('/sayHello', function () {
  return "Hello World";
});

return $app;
