<?php 
namespace Quwi\framework;
abstract class FrontController_Abstract{

    //stores the request handler
    protected $reqHandler = null;

    //invoke the controller 
    abstract public static function run();

    abstract protected function init();

    abstract protected function handleRequest();
}