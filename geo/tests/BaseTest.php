<?php

namespace Geo;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    protected $object = null;
    
    protected function setTestedClassInstance($object)
    {
        $this->object = $object;
    }
}
