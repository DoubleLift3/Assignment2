<?php

namespace App\Apps;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;
use Quwi\framework\View;
use Quwi\framework\SessionClass;


class ProfileController extends PageController_Command_Abstract {

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

            $passWRD = $this->model->findRecord($_POST['password']);
            $userPassword = implode("",$passWRD);
            
    
            if($session->accessible($user, 'profile') && $_POST['password'] == $userPassword){
                //get all courses the user is registered for
                $data = $this->model->findAll();
                //tell the model to update the changed data 
                $this->model->updateThechangedData($data); 
        
                $this->model->notify();
            }else{
               $this->error = 'Invalid Email and/or Password';
               $v->setTemplate(TPL_DIR . '/login.tpl.php');
               var_dump($verify) ;

               $v->display();
            }
           
        
    }

    public function execute(CommandContext $context) : bool{
        $this->data = $context;
        $this->run();
        return true;
    }
}