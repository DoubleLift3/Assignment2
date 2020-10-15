<?php

class ProfileController extends Controller {

    public function run(){

            SessionClass::create();
            $session = new SessionClass();
            $session->add('user', 'tester@comp3170.com');
            //create the model object 
            $v = new View();
            $v->setTemplate(TPL_DIR . '/profile.tpl.php');
    
            //set the model and the view
            $this->setModel(new ProfileModel());
            $this->setView($v);
            $this->model->attach($this->view);
            
            //check if the user can access the page
            $user = $session->show('user');

            if($session->accessible($user, 'profile')){
                //get all courses the user is registered for
                $data = $this->model->getAll();
                //tell the model to update the changed data 
                $this->model->updateThechangedData($data); 
        
                $this->model->notify();
            }else{
               
               $v->setTemplate(TPL_DIR . '/login.tpl.php');
               $v->display();
            }
           
        
    }
}