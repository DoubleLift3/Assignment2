<?php

class ProfileController extends Controller {

    public function run(){


            $error = '';
            SessionClass::create();
            $session = new SessionClass();
             $session->add('email', $_POST['email']);
            //create the model object 
            $v = new View();
            $v->setTemplate(TPL_DIR . '/profile.tpl.php');
    
            //set the model and the view
            $this->setModel(new ProfileModel());
            $this->setView($v);
            $this->model->attach($this->view);
            
            //check if the user can access the page
            $user = $session->show('email');

            $passWRD = $this->model->getRecord($_POST['email']);
            $userPassword = implode("",$passWRD);
            $verify = password_verify($_POST['password'], $userPassword);
            
    
            if($session->accessible($user, 'profile') && $verify == true /*$userPassword == $_POST['password']*/){
                //get all courses the user is registered for
                $data = $this->model->getAll();
                //tell the model to update the changed data 
                $this->model->updateThechangedData($data); 
        
                $this->model->notify();
            }else{
               $this->error = 'Invalid Email and/or Password';
               $v->setTemplate(TPL_DIR . '/login.tpl.php');
               $v->display();
            }
           
        
    }
}