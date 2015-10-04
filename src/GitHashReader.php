<?php namespace Rtablada\VersionMaster;

use Illuminate\Filesystem\Filesystem;

class GitHashReader
{
    protected $path;
    protected $file;

    const REF_REGEX = '/ref:\s(.+)/';

    public function __construct(Filesystem $file, $basePath, $gitFolder = '.git')
    {
        $this->file = $file;
        $this->path = $basePath . '/' . $gitFolder;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getHead()
    {
        $file = $this->file->get($this->getHeadPath());

        $matches = [];

        preg_match(self::REF_REGEX, $file, $matches);

        return $matches[1];
    }

    public function getFullVersion()
    {
        $path = $this->getChildPath($this->getHead());

        return $this->file->get($path);
    }

    protected function getHeadPath()
    {
        return $this->path . '/HEAD';
    }

    protected function getChildPath($path)
    {
        return $this->path . '/' . $path;
    }
}
