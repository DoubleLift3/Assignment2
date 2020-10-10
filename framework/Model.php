<?php 

  abstract class Model{

    public function loadData(array $data){
        
        $info = file_get_contents($data);
        $info= json_decode($info, true);
        $users = array("Name" => $info["Name"], "Email" => $info["Value"]);
        
    }
    abstract public function getAll() : array;

    abstract public function getRecord(string $id) : array;
    /*
    public function getAll() : array{

        $data = file_get_contents("Users.json");  
        $data= json_decode($data, true);  
        var_dump($data);
        //$observers = array("Name" => $data["Name"])
        
    }
    
    public function getRecord(string $id) : array{
        return $observers['id'];
    }*/
}