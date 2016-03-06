<?php

/**
 * The basic abstract class for all possible commands that can hold basic logic
 * that can be migrated from command type to command type.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 16:17:42
 */

namespace ArrayCommands;

use ArrayCommands\ICommand;

abstract class AbstractCommand implements ICommand
{
    /**
     * @implemented
     */
    abstract public function execute(array $array = []);
}
