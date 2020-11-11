<?php 

namespace Quwi\framework;
use App\Apps\View;

abstract class PageController_Command_Abstract implements Command_Interface {

    protected $model  = null;
    protected $view = null;

    public function setModel(Observable_Model $model){
        $this->model = $model;
    }

    public function setView(View $view){
        $this->view = $view;
    }
    
    abstract public function run();
    
    abstract public function execute(CommandContext $context) : bool;
}