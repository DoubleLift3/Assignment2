<?php 

include('Observer.php');
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
        $this->data['name'] = $name;
        $this->data['value'] = $value;
    }


    public function update(Observable_Model $obs){
        $records = $obs->giveUpdate();
        foreach ($records as $r){
            $this->addVar($r['name'], $r['val']);
        }
        $this->display();
    }
}