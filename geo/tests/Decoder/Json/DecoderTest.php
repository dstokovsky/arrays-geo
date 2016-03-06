<?php

namespace Geo\Decoder;

use Geo\BaseTest;

abstract class DecoderTest extends BaseTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->setTestedClassInstance(new \Geo\Decoder\Json\Decoder());
    }
    
    public function getValidDataForDecoding()
    {
        return [
            [true, '{"latitude": "52.986375", "user_id": 12, "name": "Christina McArdle", "longitude": "-6.043701"}'],
            [true, '{"latitude": "51.92893", "user_id": 1, "name": "Alice Cahill", "longitude": "-10.27699"}'],
            [true, '{"latitude": "51.8856167", "user_id": 2, "name": "Ian McArdle", "longitude": "-10.4240951"}'],
        ];
    }
    
    public function getInvalidDataForDecoding()
    {
        return [
            [false, '{"latitude": "52.986375", '],
            [false, '{"latitude": "51.92893", "user_id": }'],
            [false, '{"latitude": "51.8856167", "user_id": 2, }'],
        ];
    }
    
    /**
     * @dataProvider getValidDataForDecoding
     */
    public function testValidDecoding($isValid, $string)
    {
        $decodedString = $this->object->decode($string);
        $this->assertNotEmpty($decodedString);
        $this->assertEquals($isValid, (boolean) $decodedString);
        $this->assertTrue(isset($decodedString->user_id));
        $this->assertTrue(isset($decodedString->name));
        $this->assertTrue(isset($decodedString->latitude));
        $this->assertTrue(isset($decodedString->longitude));
    }
    
    /**
     * @dataProvider getInvalidDataForDecoding
     * @expectedException \Geo\Exception\Decoder\Json\InvalidDataException
     */
    public function testInvalideDecoding($isValid, $string)
    {
        $this->object->decode($string);
    }
}
