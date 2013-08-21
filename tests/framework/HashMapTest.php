<?php
/**
 * @small
 */
class HashMapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\HashMap::get
     */
    public function testIsInitiallyEmpty()
    {
        $hashMap = $this->getObjectForTrait('bankaccount\\framework\\HashMap');
        $this->assertAttributeEmpty('values', $hashMap);

        return $hashMap;
    }

    /**
     * @covers  bankaccount\framework\HashMap::set
     * @covers  bankaccount\framework\HashMap::get
     * @depends testIsInitiallyEmpty
     */
    public function testSettingDataWorks($hashMap)
    {
        $hashMap->set('foo', 'bar');

        $this->assertEquals('bar', $hashMap->get('foo'));
    }

    /**
     * @covers            bankaccount\framework\HashMap::get
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedWhenAccessingAnElementThatDoesNotExist()
    {
        $hashMap = $this->getObjectForTrait('bankaccount\\framework\\HashMap');
        $hashMap->get('foo');
    }
}
