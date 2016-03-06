<?php

namespace ArrayCommands\Flat;

class CommandTest extends \ArrayCommands\BaseTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->setCommand(new \ArrayCommands\Flat\RecursiveCommand());
    }
    
    /**
     * @dataProvider getValidFixtures
     */
    public function testValidInputData($count, $array)
    {
        $result = $this->command->execute($array);
        foreach ($result as $item){
            $this->assertFalse(is_array($item));
        }
        //BTW, the next five lines of code also can be the possible solution,
        //but as far as it is also recursive implementation I left it for
        //comparison criteria in tests.
        $iterator = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array));
        $flatArray = [];
        foreach ($iterator as $arrayItem){
            $flatArray[] = $arrayItem;
        }
        $this->assertEquals($result, $flatArray);
        $this->assertNotEmpty($result);
        $this->assertCount($count, $result);
    }
    
    /**
     * @dataProvider getEmptyFixtures
     */
    public function testInvalidInputData($count, $array)
    {
        $result = $this->command->execute($array);
        $this->assertEmpty($result);
        $this->assertCount($count, $result);
    }
    
    /**
     * @expectedException \ArrayCommands\Exception\Flat\StackOverflowException
     * @expectedExceptionMessage The nesting depth of given array is to big, it is possible to reach stack overflow
     */
    public function testStackOverflow()
    {
        $initialFlatArray = [];
        $counter = 0;
        while(count($initialFlatArray) < \ArrayCommands\Flat\RecursiveCommand::MAXIMUM_ALLOWED_RECURSION_DEPTH + 1000){
            $initialFlatArray[] = $counter++;
        }
        
        $nestedArray = [];
        for($i = count($initialFlatArray) - 1; $i >= 0; $i--){
            $nestedArray = [$initialFlatArray[$i] => $nestedArray];
        }
        
        $this->command->execute($nestedArray);
    }
}