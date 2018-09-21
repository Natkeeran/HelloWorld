<?php
namespace Islandora\Helloworld\Controller;

/**
 * Class HelloworldController
 * @package Islandora\Helloworld\Controller
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
      return "Yo Yo";
    }

}
