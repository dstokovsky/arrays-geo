<?php

/**
 * Implements the common interface for entities those can have geodata.
 *
 * @author     Denys Stokovskyi <dstokovsky@gmail.com>
 * Created on: March 6th 17:40:08
 */

namespace Geo\Entity;

interface IEntity
{
    /**
     * Validates the data set for current entity.
     * 
     * @param void
     * @return boolean
     */
    public function isValid();
}

