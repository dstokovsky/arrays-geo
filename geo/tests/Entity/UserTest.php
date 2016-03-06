<?php

namespace Geo\Entity;

use Geo\BaseTest;

class UserTest extends BaseTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->setTestedClassInstance(new \Geo\Entity\User());
    }
    
    public function getUserData()
    {
        return [
            [1, "John Smith", 23.089878, 8.988732],
            [2, "Adam Smith", 35.478656, -7.988732],
            [3, "Michael Chester", 11.898763, 27.9087876],
            [4, "Chase Marlboro", 55.7867545, 133.908654],
            [5, "Graham Hutchings", 89.089878, -24.89656],
        ];
    }
    
    /**
     * @dataProvider getUserData
     */
    public function testSettingUser($id, $name, $latitude, $longitude)
    {
        $this->object->latitude = $latitude;
        $this->object->longitude = $longitude;
        $this->assertFalse($this->object->isValid());
        $this->object->name = $name;
        $this->assertFalse($this->object->isValid());
        $this->object->id = $id;
        $this->assertTrue($this->object->isValid());
    }
    
    /**
     * @dataProvider getUserData
     */
    public function testUserToString($id, $name, $latitude, $longitude)
    {
        $this->object->id = $id;
        $this->object->name = $name;
        $this->object->latitude = $latitude;
        $this->object->longitude = $longitude;
        $this->assertEquals("#{$this->object->id} - {$this->object->name}" . PHP_EOL, $this->object);
    }
}
