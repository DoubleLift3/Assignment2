<?php 
namespace App\Apps;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;



class IndexController extends PageController_Command_Abstract {

    private $data = null;
    public function run(){
        //create the model object 
        $v = new View();
        $v->setTemplate(TPL_DIR . '/index.tpl.php');

        //set the model and the view
        $this->setModel(new IndexModel());
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