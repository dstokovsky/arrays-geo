<?php

/**
 * Implements file reader logic.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:51:27
 */

namespace Geo\Reader\File;

use Geo\Reader\AbstractReader;
use Geo\Decoder\IDecoder;
use Geo\Exception\Reader\File\FileDoesNotExistException;
use Geo\Exception\Reader\File\FileIsNotReadableException;

class Reader extends AbstractReader
{
    /**
     * @overriden
     */
    public function read($source = null, IDecoder $decoder = null) {
        if(!file_exists($source)){
            throw new FileDoesNotExistException("'$source' file does not exist");
        }
        
        if(!is_readable($source)){
            throw new FileIsNotReadableException("'$source' file is not readable");
        }
        
        $fileIterator = new \SplFileObject($source);
        $lines = [];
        foreach ($fileIterator as $line){
            $lines[] = !empty($decoder) ? $decoder->decode($line) : $line;
        }
        
        return $lines;
    }
}
