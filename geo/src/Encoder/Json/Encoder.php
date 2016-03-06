<?php

/**
 * Implements the encoding data to json.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:40:08
 */

namespace Geo\Encoder\Json;

use Geo\Encoder\AbstractEncoder;

class Encoder extends AbstractEncoder
{
    /**
     * @overriden
     */
    public function encode($value, $key = '')
    {
        return @json_encode($value);
    }
}
