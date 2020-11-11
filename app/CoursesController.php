<?php
namespace App\Apps;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;
use Quwi\framework\View;

class CoursesController extends PageController_Command_Abstract {

    public function run(){
        //create the model object 
        $v = new View();
        $v->setTemplate(TPL_DIR . '/courses.tpl.php');

        //set the model and the view
        $this->setModel(new CoursesModel());
        $this->setView($v);
        $this->model->attach($this->view);
        
        //
        $data = $this->model->findAll();
        //tell the model to update the changed data 
        $this->model->updateThechangedData($data); 

        $this->model->notify();

        
    }

    public function execute(CommandContext $context) : bool{
        $this->data = $context;
        $this->run();
        return true;
    }

}