<?php 

class SessionClass {

    protected $access = ['profile'=>['tester@comp3170.com', 'shamba', 'batman']];
    public static function create(){
        if(session_status() ==PHP_SESSION_NONE){
            session_start(); 
        }
            
        }

    public static function destroy(){
        if(isset($_SESSION)){
            unset($_SESSION);
            session_destroy();
        }
        
        //header("Location: index.php");
    }

    public function add(string $name, $value){
        if(preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name) == 0 ){
            trigger_error('Invalid variable name used', E_USER_ERROR);
        } 
        $_SESSION[$name] = $value ;
    }

    public function show($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return null;
    }
    public function remove(string $name){
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    }

    public function accessible(string $user, $page) : bool{
        if(in_array($user, $this->access[$page])){
            return true;
        }
        return false;
    }

}