<?php

/**
 * Defines the common logic for any type of decoder.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 16:50:10
 */

namespace Geo\Decoder;

use Geo\Decoder\IDecoder;

abstract class AbstractDecoder implements IDecoder
{
    /**
     * @implemented
     */
    abstract public function decode($string, $key = '');
}
