<?php

namespace Zenstruck\Media\Test\File;

use Zenstruck\Media\File\File;
use Zenstruck\Media\Test\BaseTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class FileTest extends BaseTest
{
    public function testConstructor()
    {
        $file = new File($this->getFixtureFileDir() . 'ipsum.txt', '/foo');
        $this->assertEquals('ipsum.txt', $file->getFilename());

        $this->setExpectedException(
            'Zenstruck\Media\Exception\Exception',
            'The dir "files" is not supported by "Zenstruck\Media\File\File"'
        );
        $file = new File($this->getFixtureFileDir(), '/foo');
    }
}
