<?php

/**
 * Defines the basic type interface for possible commands to work with arrays.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 16:16:34
 */

namespace ArrayCommands;

interface ICommand
{   
    /**
     * Executes the necessary set of rules over the array to make the current command
     * applied successfully.
     * 
     * @param array $array
     * @return array
     */
    public function execute(array $array = []);
}

