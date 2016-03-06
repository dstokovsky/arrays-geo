<?php

/**
 * Common interface for all possible readers from different type of sources.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:46:04
 */

namespace Geo\Reader;

use Geo\Decoder\IDecoder;

interface IReader
{
    /**
     * Sets the source where to read data from.
     * 
     * @param mixed $source
     * @return void
     */
    public function setSource($source);
    
    /**
     * Sets the decoder to use if data stored encoded.
     * 
     * @param IDecoder $decoder
     * @return void
     */
    public function setDecoder(IDecoder $decoder);
    
    /**
     * Returns all the read lines from file as array.
     * 
     * @param type $source
     * @param IDecoder $decoder
     * @return array
     */
    public function read($source = null, IDecoder $decoder = null);
}
