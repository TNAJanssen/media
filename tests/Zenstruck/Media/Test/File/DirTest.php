<?php

namespace Zenstruck\Media\Test\File;

use Zenstruck\Media\File\Dir;
use Zenstruck\Media\Test\BaseTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class DirTest extends BaseTest
{
    public function testConstructor()
    {
        $file = new Dir($this->getFixtureFileDir(), '/foo');
        $this->assertEquals('files', $file->getFilename());

        $this->setExpectedException(
            'Zenstruck\Media\Exception\Exception',
            'The file "ipsum.txt" is not supported by "Zenstruck\Media\File\Dir"'
        );
        $file = new Dir($this->getFixtureFileDir() . 'ipsum.txt', '/foo');
    }
}
