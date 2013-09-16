<?php

namespace Zenstruck\Media\File;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class Dir extends File
{
    public function isSupported()
    {
        return $this->isDir();
    }
}
