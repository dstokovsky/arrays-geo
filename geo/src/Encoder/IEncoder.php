<?php

/**
 * Defines the basic type interface for possible encoders.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:38:11
 */

namespace Geo\Encoder;

interface IEncoder
{
    /**
     * Encodes specified value using necessary algorithm with key if needed.
     * 
     * @param mixed $value
     * @param string $key
     * @return mixed
     */
    public function encode($value, $key = '');
}
