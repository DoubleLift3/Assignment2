<?php 

require "Controller.php";
class IndexController extends Controller {

    public function run(){
        $this->setModel(new IndexModel());
        $this-setView(new View());

        $this->model->view->setTemplate('C:\wamp64\www\FrameworksAssignment\tpl\index.tpl.php');
        $this->model->attach($this->view);

        
    }
}