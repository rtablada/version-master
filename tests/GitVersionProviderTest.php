<?php namespace Rtablada\VersionMaster\Test;

use Rtablada\VersionMaster\GitHashReader;
use Illuminate\Filesystem\Filesystem;

class GitVersionProvider extends \TestCase
{
    /**
     * Test that the path can be set
     */
    public function testSetSingleton()
    {
        $reader = app('git-hash');

        $this->assertSame(app()->basePath() . '/git-mock', $reader->getPath());
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testView()
    {
        $this->visit('/')
             ->see('69ac63a');
    }
}
