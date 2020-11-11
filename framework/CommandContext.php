<?php 
namespace Quwi\framework;

class CommandContext extends CommandContext_Abstract{

    public function add(string $key, $val){
        $this->$data[$key] = $val;
    }

    public function get(string $key){
        if (isset($this->get[$key])){
            return $this->get[$key];
        }
       // print_r($_GET);
        return 'index';
    }

    protected function setError($errors){
        $this->errors = $errors;
    }

    public function getErrors() : array {
        return $this->$errors;
    }
}