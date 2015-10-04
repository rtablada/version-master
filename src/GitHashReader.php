<?php namespace Rtablada\VersionMaster;

class GitHashReader
{
    protected $path;

    public function __construct($basePath, $gitFolder = '.git')
    {
        $this->path = $basePath . '/' . $gitFolder;
    }

    public function getPath()
    {
        return $this->path;
    }
}
