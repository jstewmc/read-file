<?php
/**
 * The file for the read-file service tests
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2016 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\ReadFile;

use Jstewmc\TestCase\TestCase;
use org\bovigo\vfs\{vfsStream, vfsStreamDirectory, vfsStreamFile};

/**
 * Tests for the read-file service
 */
class ReadTest extends TestCase
{
    /**
     * @var  vfsStreamDirectory  the "root" virtual file system directory
     */
    private $root;
    
	
	/* !Framework methods */
    
    /**
     * Called before every test
     *
     * @return  void
     */
    public function setUp()
    {
        $this->root = vfsStream::setup('test');
        
        return;
    }
    
    
    /* !__invoke() */
    
    /**
     * __invoke() should throw an exception if the file does not exist
     */
    public function testInvokeThrowsExceptionIfFileDoesNotExist()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        (new Read())(vfsStream::url('test/path/to/foo.php'));
        
        return;
    }
    
    /**
     * __invoke() should throw an exception if the file is not actually a file
     */
    public function testInvokeThrowsExceptionIfFileIsNotFile()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        $directory = 'foo';
        
        new vfsStreamDirectory($directory);
        
        (new Read())(vfsStream::url($directory));
        
        return;
    }
    
    /**
     * __invoke() should throw an exception if the file is not readable
     */
    public function testInvokeThrowsExceptionIfFileIsNotReadable()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        $filename = 'test/foo.txt';
        
        new vfsStreamFile($filename, 0000);
        
        (new Read())(vfsStream::url($filename));
        
        return;
    }
    
    /**
     * __invoke() should return string if the file is readable
     */
    public function testInvokeReturnsStringIfTheFileIsReadable()
    {
        $filename = vfsStream::url('test/foo.txt');
        
        $contents = 'foo';
    
        file_put_contents($filename, $contents);
        
        $this->assertEquals($contents, (new Read())($filename));
        
        return; 
    }
}
