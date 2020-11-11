<?php 

namespace Quwi\framework;

abstract class CommandContext_Abstract{

    //stores data for the context
    protected $post = [];
    protected $get = [];
    protected $params = [];

    //stores all error messages 
    protected $errors = [];

    //Initializes the command data property with the data stored in POST and GET

    public function __construct(){
        $this->post = $_POST;
        $this->get = $_GET;
        $this->params = [];
    }

    abstract public function add(string $key, $val);

    //retrieve a stored variable
    abstract public function get(string $key);

    //set error
    abstract protected function setError($error);

    //Returns all error messages set in the context
    abstract public function getErrors() : array;
}