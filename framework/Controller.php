<?php 

abstract class Controller {

    protected $model  = null;
    protected $view = null;

    public function setModel(Observable_Model $model){
        $this->model = $model;
    }

    public function setView(View $view){
        $this->view = $view;
    }
    
    abstract public function run();
    
}