<?php
namespace Quwi\framework;

/**
 * Takes data as name-value pairs in an array where the name 
 * is the associative array index e.g data['foo'] = 'bar';
 */
trait Insert_Trait{
    abstract public function insert();
}