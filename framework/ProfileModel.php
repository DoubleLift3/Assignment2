<?php

class ProfileModel extends Observable_Model {

  
    public function getAll() : array{
        
        return [];
        
    }

    public function getRecord(string $id) : array {
        $data = $this->loadData(DATA_DIR . '/Users.json');
        $userPass = '';
        //return $data;
        //$data = file_get_contents('Users.json');
        //$data = json_decode($data, true);
        //$value = 0;
       foreach ($data as $item){
            if($item["email"] == $id){
                $userPass = $item["password"];
            }
        }
        return ['hashedPassword'=>$userPass];
        //var_dump
        //return [];
        
    }
}


