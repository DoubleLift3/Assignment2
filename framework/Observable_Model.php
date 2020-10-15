<?php 

abstract class Observable_Model extends Model implements Observable{


    protected $observers = [];

    protected $updatedData = [];

    public function attach(Observer $o){
        $this->observers[] = $o;
    }

    public function detach(Observer $o){
        $this->observers = array_filter($this->observers, function ($a) use ($o){
            return (! ($a === $o));
        });
    }

    public function notify(){
        foreach ($this->observers as $ob){
            $ob->update($this);
        }
    }

    public function giveUpdate(){

        return $this->updatedData; 
    }

    public function updateTheChangedData(array $d){
        $this->updatedData = $d;
    }
   
    public function passwordVerify(string $password){
        
    }
    
    abstract public function getAll() : array;
    
    abstract public function getRecord(string $id) : array;
}