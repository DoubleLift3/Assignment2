<?php 
namespace Quwi\framework;
  abstract class Model{
    use Insert_Trait;
      protected $cached_json = [];
      protected $sqli = null;
        
        /**
         * Creates a database connection
         */

        public function makeConnection(){
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db = 'frameworks';

            $sqli = new \mysqli($host, $user, $password, $db);
              if($sqli->connect_error){
                  die("Connection Failed: " . $sqli->connect_error);
              }
              return $sqli;
            }
         

    /*public function loadData(string $fromFile) : array{
        $filename = basename($fromFile. 'json');
        if(!isset($this->cached_json[$filename]) || empty($this->cached_json[filename])){
          $json_file=file_get_contents($fromFile);
          $this->cached_json[$filename] = json_decode($json_file, true);  
        }
        return $this->cached_json[$filename];
    } */
    abstract public function findAll() : array;

    abstract public function findRecord(string $id) : array;

    public function insert(){
      $pswd = $_POST['password'];
      //hash password
      $hashedPassword = password_hash($pswd, PASSWORD_DEFAULT);
    
      $connect = $this->makeConnection();
      $query_string = "INSERT INTO users(Username, email, Userpass) VALUE ('$_POST[formFullName]','$_POST[email]', '$pswd' )" ;
      $result = $connect->query($query_string);
      if ($connect->errno){
          trigger_error('SQL error ' . $connect->error, E_USER_ERROR);
      }
    }
    
   
}