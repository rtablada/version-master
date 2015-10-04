<?php namespace Rtablada\VersionMaster\Test;

use Rtablada\VersionMaster\GitHashReader;
use Illuminate\Filesystem\Filesystem;

class GitHashReaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that the path can be set
     */
    public function testCanSetPath()
    {
        $reader= new GitHashReader(new Filesystem(), __DIR__ . '/stubs', 'git-mock');

        $this->assertSame(__DIR__ . '/stubs/git-mock', $reader->getPath());
    }

    public function testCanReadHead()
    {
        $reader= new GitHashReader(new Filesystem(), __DIR__ . '/stubs', 'git-mock');

        $this->assertSame('refs/heads/master', $reader->getHead());
    }
}
