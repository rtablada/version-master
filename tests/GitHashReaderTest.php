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

    public function testCanReadFullVersion()
    {
        $reader= new GitHashReader(new Filesystem(), __DIR__ . '/stubs', 'git-mock');

        $this->assertSame("69ac63ac776188738b75b9bde97f8c5dd93d3f18\n", $reader->getFullVersion());
    }
}
