<?php 

namespace App\Apps;

use Quwi\framework\Observable_Model;

class RegistrationModel extends Observable_Model{

    public function findAll() : array{
     
        return [];

    }

    public function findRecord(string $id) : array {
        return [];
    }
    
    /*public function register() {
              
        //get the password from the post super global 
        $pswd = $_POST['password'];
        //hash password
        $hashedPassword = password_hash($pswd, PASSWORD_DEFAULT);
      
        $connect = $this->makeConnection();
        $query_string = "INSERT INTO users(Username, email, Userpass) VALUE ('$_POST[formFullName]','$_POST[email]', '$pswd' )" ;
        $result = $connect->query($query_string);
        if ($connect->errno){
            trigger_error('SQL error ' . $connect->error, E_USER_ERROR);
        }
    }*/
}