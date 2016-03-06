<?php

/**
 * The exception used to indicate recursion stack overflow error.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 16:20:34
 */

namespace ArrayCommands\Exception\Flat;

use ArrayCommands\Exception\CommandException as AbstractCommandException;

class StackOverflowException extends AbstractCommandException{}
