<?php 

class CoursesModel extends Observable_Model{

    public function getAll() : array{
        
        //returns all courses
       $data = $this->loadData(DATA_DIR . '/courses.json');
        return $data;
        
    }

    public function getRecord(string $id) : array {
        return [];
    }
}