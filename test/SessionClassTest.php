<?php 
use PHPUnit\Framework\TestCase;
require 'framework/SessionClass.php';
/**
 * Is the Sessionlass created
 */
class SessionClassTest extends TestCase{
    public function testSessionObjectIsCreated () : void{
        $this->assertIsObject(new SessionClass);
    }
    
    public function testSessionManagerHasStaticMethodCreate() : void {
        $method = new ReflectionMethod('SessionClass', 'create');
        $this->assertTrue($method->isStatic(), 'Method create() exists but is static');
    }

    
    public function testSessionManagerHasStaticMethodDestroy() : void {
        $method = new ReflectionMethod('SessionClass', 'destroy');
        $this->assertTrue($method->isStatic(), 'Method destroy() exists but is static');
    }


    public function testSessionContainerCreated() : void{
        SessionClass::create();
        $this->assertArrayHasKey('container', $_SESSION);
        $this->assertIsArray($_SESSION['container']);
    }

}