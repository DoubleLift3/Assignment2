<?php

class ProfileModel extends Observable_Model {

  
    public function getAll() : array{
        
        return [];
        
    }

    public function getRecord(string $id) : array {
        $data = $this->loadData(DATA_DIR . '/Users.json');
        $userPass = '';
        
       foreach ($data as $item){
            if($item['email'] == $id){
                $userPass = $item['password'];
            }
        }
        return ['hashedPassword'=>$userPass];
        
    }
}


