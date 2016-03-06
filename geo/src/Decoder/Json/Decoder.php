<?php

/**
 * Implements the decoding data from json.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 16:51:23
 */

namespace Geo\Decoder\Json;

use Geo\Decoder\AbstractDecoder;
use Geo\Exception\Decoder\Json\InvalidDataException;

class Decoder extends AbstractDecoder
{
    /**
     * @overriden
     */
    public function decode($string, $key = '')
    {
        $decodedData = @json_decode($string);
        if(!empty($string) && empty($decodedData)){
            throw new InvalidDataException("Invalid encoded data provided for decoding: " . print_r($string, true));
        }
        
        return $decodedData;
    }
}
