<?php

namespace ArrayCommands;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * 
     * @var \ArrayCommands\ICommand
     */
    protected $command = null;
    
    protected function setCommand(\ArrayCommands\ICommand $command)
    {
        $this->command = $command;
    }
    
    public function getValidFixtures()
    {
        return [
            [20, [0, [], [], [[], [[]]], [1,2,[3]],4, [5,6,7,[8,[9, 10]]], 11, [12], 13, [14, [15, 16]], [[[[[17, 18, [19]]]]]]]],
            [4,  [[1,2,[3]],4]],
            [9, [[[[[[5], [6, 7, 8]]]]], 9, 10, [11, [12], 13]]],
        ];
    }
    
    public function getEmptyFixtures()
    {
        return [
            [0, [[], [], [[], [[]]]]],
            [0,  []],
            [0, [[[[[[], []]]]], [], [], [[], [], []]]],
        ];
    }
}
