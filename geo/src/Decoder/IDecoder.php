<?php

/**
 * Defines the basic type interface for possible decoders.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 16:46:43
 */

namespace Geo\Decoder;

interface IDecoder
{
    /**
     * Decodes specified string using necessary algorithm with key if needed.
     * 
     * @param string $string
     * @param string $key
     * @return mixed
     */
    public function decode($string, $key = '');
}
