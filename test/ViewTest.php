<?php 
use PHPUnit\Framework\TestCase;
require 'framework/View.php';
/**
 * 
 */
class ViewTest extends TestCase{
    public function testViewObjectIsCreated () : void{
        $this->assertIsObject(new View);
    }

    
    
}