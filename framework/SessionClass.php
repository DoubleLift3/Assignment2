<?php 
class SessionClass {

    public static function create(){
        if(session_status() == PHP_SESSION_NONE){
            $_SESSION['test']="";
        }
        
    }

    public static function destroy(){
        
        session_unset();
        session_destroy();
        header("Location: index.php");
    }

    public function add(string $name, $value){
        $_SESSION[$name] = $value ;
    }

    public function remove(string $name){
        unset($_SESSION[$name]);
    }

    public function accessible(string $user, $page) : bool{

    }

}