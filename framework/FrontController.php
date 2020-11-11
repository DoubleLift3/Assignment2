<?php

namespace Quwi\framework;
class FrontController extends FrontController_Abstract{

    private function __construct(){

    }

    private function __clone(){
        
    }
    public static function run(){
        $controller = new FrontController();
        $controller->init();
        $controller->handleRequest();
    }

    //use this method to initialize helper objects e.g:SessionManager, Validator
    protected function init(){
        //$session = new SessionClass();
       // $session->create();
       $responeHandler = ResponseHandler::__construct();
       $responseHeader = new ResponseHeader();
       $responseState = new ResponseState();
       $responseLogger = new ResponseLogger();

    }

    protected function handleRequest(){
        $context =  new CommandContext();
        $request =  $context->get('controller');
        $handler = RequestHandlerFactory::makeRequestHandler($request);

        
        if($handler->execute($context)===false){
            //error handlig
        }
    }
}