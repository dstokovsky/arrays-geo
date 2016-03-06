<?php

namespace Geo\Encoder\Json;

use Geo\BaseTest;

class EncoderTest extends BaseTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->setTestedClassInstance(new \Geo\Encoder\Json\Encoder());
    }
    
    public function getDataForEncoding()
    {
        return [
            [null, "null"],
            [['foo' => 'bar', 'test' => "test"], '{"foo":"bar","test":"test"}'],
            [[1, 2, "foo" => 3, "bar" => 4], '{"0":1,"1":2,"foo":3,"bar":4}'],
        ];
    }
    
    /**
     * @dataProvider getDataForEncoding
     */
    public function testValidEncoding($actual, $expected)
    {
        $encodedString = $this->object->encode($actual);
        $this->assertNotEmpty($encodedString);
        $this->assertEquals($encodedString, $expected);
    }
}
