<?php 

class RegistrationModel extends Observable_Model{

    public function getAll() : array{
        
        //returns all courses
       $data = $this->loadData(DATA_DIR . '/Users.json');
        return $data;
        
    }

    public function getRecord(string $id) : array {
        return [];
    }
}