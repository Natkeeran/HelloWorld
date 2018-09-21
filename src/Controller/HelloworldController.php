<?php

namespace Islandora\Helloworld\Controller;

/**
 * Class HelloWorldController
 * @package Islandora\HelloWorld\Controller
 * @param $log
 */


class HelloworldController
{
  /**
   * @var \Monolog\Logger
   */
  protected $log;

  /**
     * Controller constructor.
     */
    public function __construct() {

    }

    public function sayYo() {
      return "5555555555555555555555";
    }

}
