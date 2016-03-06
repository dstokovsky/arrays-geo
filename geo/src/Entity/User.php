<?php

/**
 * User model.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:45:14
 */

namespace Geo\Entity;

use Geo\Entity\AbstractEntity;

class User extends AbstractEntity
{
    /**
     * Implements behaviour for cases when the User object will be used as string.
     * 
     * @param void
     * @return string
     */
    public function __toString()
    {
        return "#$this->id - $this->name" . PHP_EOL;
    }

    /**
     * @overriden
     */
    public function isValid()
    {
        if(!isset($this->id) || empty($this->id)){
            return false;
        }
        
        if(!isset($this->name) || empty($this->name)){
            return false;
        }
        
        return true;
    }
}
