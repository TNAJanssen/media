<?php

namespace Zenstruck\Media;

use Zenstruck\Media\Exception\Exception;
use Zenstruck\Media\Filesystem\FilesystemInterface;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class FilesystemRegistry
{
    /**
     * @var FilesystemInterface[]
     */
    private $filesystems = array();

    /**
     * @param FilesystemInterface $filesystem
     *
     * @throws Exception
     */
    public function add(FilesystemInterface $filesystem)
    {
        $name = $filesystem->getName();

        if (isset($this->filesystems[$name])) {
            throw new Exception(sprintf('The filesystem named "%s" is already registered.', $name));
        }

        $this->filesystems[$name] = $filesystem;
    }

    /**
     * @param string $name
     *
     * @return FilesystemInterface
     *
     * @throws Exception
     */
    public function get($name)
    {
        if (!isset($this->filesystems[$name])) {
            throw new Exception(sprintf('The filesystem named "%s" is not registered.', $name));
        }

        return $this->filesystems[$name];
    }

    /**
     * @return FilesystemInterface[]
     */
    public function all()
    {
        return $this->filesystems;
    }
}
