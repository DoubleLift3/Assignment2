<?php 
namespace App\Apps;
use Quwi\framework\Observer;
use Quwi\framework\Observable_Model;
class View implements Observer {

    private $tpl = '';
    private $data = [];
   

    public function setTemplate(string $filename){
        if($filename != null){
            $this->tpl = $filename;
        }
         
    }

    public function display(){
        extract($this->data);
           require $this->tpl;
    }

    public function addVar(string $name, $value){
        if(preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name) == 0 ){
            var_dump($name);
            trigger_error('Invalid variable name used', E_USER_ERROR);
           
        } 
       
        $this->data[$name] = $value;

    }


    public function update(Observable_Model $obs){
        $records = $obs->giveUpdate();
        foreach ($records as $k=>$r){
            $this->addVar($k, $r);
        }
        $this->display();
    }
}