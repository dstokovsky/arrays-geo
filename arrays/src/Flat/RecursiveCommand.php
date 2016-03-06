<?php

/**
 * The class that implements the logic for command to convert an array with undefined
 * nesting depth into the flat array of values.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 16:19:00
 */

namespace ArrayCommands\Flat;

use ArrayCommands\AbstractCommand;
use ArrayCommands\Exception\Flat\StackOverflowException;

class RecursiveCommand extends AbstractCommand
{
    /**
     * Sets the maximum recursion stack depth.
     */
    const MAXIMUM_ALLOWED_RECURSION_DEPTH = 10000;
    
    /**
     * @overriden
     */
    public function execute(array $array = [])
    {
        static $recursionDepthCounter = 0;
        ++$recursionDepthCounter;
        if($recursionDepthCounter > self::MAXIMUM_ALLOWED_RECURSION_DEPTH){
            throw new StackOverflowException('The nesting depth of given array is to big, it is possible to reach stack overflow');
        }
        $resultedArray = [];
        if(empty($array)){
            return $resultedArray;
        }
        foreach ($array as $arrayItem){
            if(is_array($arrayItem)){
                $resultedArray = array_merge($resultedArray, $this->execute($arrayItem));
            }else{
                $resultedArray[] = $arrayItem;
            }
        }

        return $resultedArray;
    }
}
