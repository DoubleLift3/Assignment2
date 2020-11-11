<?php

namespace App\Apps;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;


class SignupController extends PageController_Command_Abstract{

    public function run(){
        //create the model object 
        $v = new View();
        $v->setTemplate(TPL_DIR . '/signup.tpl.php');

        //set the model and the view
        $this->setModel(new SignupModel());
        $this->setView($v);
        $this->model->attach($this->view);
        
        
        $this->model->notify();
    }

    public function execute(CommandContext $context) : bool{
        $this->data = $context;
        $this->run();
        return true;
    }
}