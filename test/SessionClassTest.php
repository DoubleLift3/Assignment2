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
        $this->assertEquals(PHP_SESSION_ACTIVE, true);
    }

    public function testSessionDestroyed() : void{
        SessionClass::create();
        SessionClass::destroy();
        $this->assertEquals(PHP_SESSION_NONE, true);
    }

    public function testSessionRemove() : void{
        SessionClass::create();
        SessionClass::remove($_SESSION["test"]);
        $this->assertNull($_SESSION);
    }

    public function testSessionAdd() : void{
        $testVariable = 'xc';
        $testingValue = 6;
       SessionClass::add($testVariable, $testingValue);
    }

}