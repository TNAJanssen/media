<?php

namespace Zenstruck\Media\File;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
interface FileInterface
{
    /**
     * The absolute path to the file
     *
     * @return string
     */
    public function getSource();

    /**
     * The web path to the file
     *
     * @return string
     */
    public function getPath();

    /**
     * Whether or not the file type is supported
     *
     * @return bool
     */
    public function isSupported();
}
