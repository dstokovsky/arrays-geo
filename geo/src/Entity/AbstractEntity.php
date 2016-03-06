<?php

/**
 * Implements common logic for all domain entities.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:41:38
 */

namespace Geo\Entity;

use Geo\Entity\IEntity;

abstract class AbstractEntity implements IEntity
{
    /**
     * Sets the entity attribute with given value.
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
    /**
     * Gets the attribute value with specified name.
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }
    
    /**
     * @implemented
     */
    abstract public function isValid();
}
