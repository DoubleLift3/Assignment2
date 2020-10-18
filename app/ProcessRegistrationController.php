<?php

class ProcessRegistrationController extends Controller {

   public function run (){

        $this->setModel(new RegistrationModel());
        
        //get the password from the post super global 
        $pswd = $_POST['password'];
        //hash password
        $hashedPassword = password_hash($pswd, PASSWORD_DEFAULT);
        
        //open or read the json data
       $data = $this->model->getAll();
        var_dump($data);
        //store name, email and password in an array
        $userData = array($_POST['formFullName'], $hashedPassword, $_POST['email']);
        $tempArray[] = $userData;
        array_push($data, $tempArray);
        $jsonData = json_encode($data);
        var_dump($jsonData);
        file_put_contents('Users.json', $jsonData);
        header("Location: login.php");
        
    }
    
}