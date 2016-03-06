<?php

namespace Geo\Reader\File;

use Geo\BaseTest;

class ReaderTest extends BaseTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->setTestedClassInstance(new \Geo\Reader\File\Reader());
    }
    
    public function getFileData()
    {
        return [
            [32, __DIR__ . '/../../../../examples/customers.json'],
        ];
    }
    
    public function getNonExistedFileData()
    {
        return [
            [53, __DIR__ . '/../../../../examples/users.json'],
        ];
    }
    
    /**
     * @dataProvider getFileData
     */
    public function testReading($linesCount, $file)
    {
        $lines = $this->object->read($file, new \Geo\Decoder\Json\Decoder());
        $this->assertCount($linesCount, $lines);
        foreach ($lines as $line){
            $this->assertTrue(isset($line->user_id));
            $this->assertTrue(is_numeric($line->user_id));
            $this->assertTrue(isset($line->name));
            $this->assertTrue(isset($line->latitude));
            $this->assertTrue(isset($line->longitude));
        }
    }
    
    /**
     * @dataProvider getNonExistedFileData
     * @expectedException \Geo\Exception\Reader\File\FileDoesNotExistException
     */
    public function testNonExistedFile($linesCount, $file)
    {
        $this->object->read($file);
    }
    
    /**
     * @expectedException \Geo\Exception\Reader\File\FileIsNotReadableException
     */
    public function testNotReadableFile()
    {
        $file  = __DIR__ . '/test.txt';
        touch($file);
        chmod($file, 0300);
        $this->object->read($file);
    }
    
    protected function tearDown() {
        parent::tearDown();
        if(file_exists(__DIR__ . '/test.txt')){
            unlink(__DIR__ . '/test.txt');
        }
    }
}
