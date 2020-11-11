<?php 
namespace App\Apps;
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

    public function add(string $email, $value){
        /*if(preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name) == 0 ){
            trigger_error('Invalid variable name used', E_USER_ERROR);
        } */
        $_SESSION[$email] = $value ;
    }

    public function show($email){
        if(isset($_SESSION[$email])){
            return $_SESSION[$email];
        }
        return null;
    }
    public function remove(string $email){
        if(isset($_SESSION[$email])){
            unset($_SESSION[$email]);
        }
    }

    public function accessible(string $user, $page) : bool{
        if(in_array($user, $this->access[$page])){
            return true;
        }
        return false;
    }

}