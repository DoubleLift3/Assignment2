<?php
class CoursesController extends Controller {

    public function run(){
        //create the model object 
        $v = new View();
        $v->setTemplate(TPL_DIR . '/courses.tpl.php');

        //set the model and the view
        $this->setModel(new CoursesModel());
        $this->setView($v);
        $this->model->attach($this->view);
        
        //
        $data = $this->model->getAll();
        //tell the model to update the changed data 
        $this->model->updateThechangedData($data); 

        $this->model->notify();
    }

}