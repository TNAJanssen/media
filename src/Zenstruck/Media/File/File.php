<?php

namespace Zenstruck\Media\File;

use Zenstruck\Media\Exception\Exception;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class File extends \SplFileInfo implements FileInterface
{
    protected $source;
    protected $path;

    public function __construct($source, $path)
    {
        parent::__construct($source);

        $this->source = $source;
        $this->path = $path;

        if (!$this->isSupported()) {
            throw new Exception(sprintf('The %s "%s" is not supported by "%s"', $this->getType(), $this->getFilename(), get_class($this)));
        }
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function isSupported()
    {
        return $this->isFile();
    }
}
