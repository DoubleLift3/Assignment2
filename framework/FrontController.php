<?php

namespace Quwi\framework;
use App\Apps\SessionClass;
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
       // SessionClass::create();
        //$session = new SessionClass();
       
      
      

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