<?php

namespace CarFramework\Tests;

class BaseObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $obj = new TestObject();
        $obj->value = 234;

        $this->assertEquals(234, $obj->getValue());
    }

    public function testSet()
    {
        $obj = new TestObject();
        $obj->setValue(234);

        $this->assertEquals(234, $obj->value);
    }

    public function testBadMethod()
    {
        $obj = new TestObject();

        $this->setExpectedException("BadMethodCallException");
        $obj->bad();
    }
}

class TestObject extends \CarFramework\BaseObject
{

}
