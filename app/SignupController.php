<?php

class SignupController extends Controller{

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
}