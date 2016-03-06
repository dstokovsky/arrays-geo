<?php

/**
 * Defines the common logic for any type of decoder.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:39:37
 */

namespace Geo\Encoder;

use Geo\Encoder\IEncoder;

abstract class AbstractEncoder implements IEncoder
{
    /**
     * @implemented
     */
    abstract public function encode($value, $key = '');
}
