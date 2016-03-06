<?php

/**
 * Implements common logic for different type of readers.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:48:44
 */

namespace Geo\Reader;

use Geo\Reader\IReader;
use Geo\Decoder\IDecoder;

abstract class AbstractReader implements IReader
{
    /**
     * The source where to read data from.
     *
     * @var mixed
     */
    protected $source = null;
    
    /**
     * The instance of decoder if data stored encoded.
     *
     * @var IDecoder
     */
    protected $decoder = null;

    /**
     * @implemented
     */
    public function setSource($source)
    {
        if(!empty($source)){
            $this->source = $source;
        }
    }
    
    /**
     * @implemented
     */
    public function setDecoder(IDecoder $decoder) {
        $this->decoder = $decoder;
    }
    
    /**
     * @implemented
     */
    abstract public function read($source = null, IDecoder $decoder = null);
}
