<?php 
class LoginController extends Controller{
    public function run(){

        SessionClass::create();
        //create the model object 
        $v = new View();
        $v->setTemplate(TPL_DIR . '/login.tpl.php');

        //set the model and the view
        $this->setModel(new LoginModel());
        $this->setView($v);
        $this->model->attach($this->view);
        
        
        $data = $this->model->getAll();
        //tell the model to update the changed data 
        $this->model->updateThechangedData($data); 

        $this->model->notify();
        
    }
} 