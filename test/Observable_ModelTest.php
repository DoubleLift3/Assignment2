<?php 

use PHPUnit\Framework\TestCase;
require 'framework/Observable_Model.php';

class Observable_ModelTest extends TestCase{

 
    public function testModelHasStaticMethodgetAll() : void {
        $method = new ReflectionMethod('Model', 'getAll');
        $this->assertTrue($method->isStatic(), 'Method getAll() exists but is static');
    }

    public function getAllRecordsTest(){
        $model = new Observable_Model();
        $json = $model->getAll();
        $this->assertCount(1, $json[0]);
    }

   /* public function testModelReturnsAnArray() : void{
        $this->assertIsArray();
    }*/
}