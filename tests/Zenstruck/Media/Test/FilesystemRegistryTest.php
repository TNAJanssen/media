<?php

namespace Zenstruck\Media\Test;

use Zenstruck\Media\Filesystem\FilesystemInterface;
use Zenstruck\Media\FilesystemRegistry;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class FilesystemRegistryTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $registry = new FilesystemRegistry();
        $this->assertCount(0, $registry->all());

        $registry->add($this->createFilesystem('filesystem1'));
        $this->assertCount(1, $registry->all());

        $registry->add($this->createFilesystem('filesystem2'));
        $this->assertCount(2, $registry->all());

        $this->setExpectedException('Zenstruck\Media\Exception\Exception', 'The filesystem named "filesystem1" is already registered.');
        $registry->add($this->createFilesystem('filesystem1'));
    }

    public function testGet()
    {
        $registry = new FilesystemRegistry();

        $registry->add($this->createFilesystem('filesystem1'));
        $registry->add($this->createFilesystem('filesystem2'));

        $this->assertInstanceOf('Zenstruck\Media\Filesystem\FilesystemInterface', $registry->get('filesystem1'));
        $this->assertEquals('filesystem1', $registry->get('filesystem1')->getName());
        $this->assertInstanceOf('Zenstruck\Media\Filesystem\FilesystemInterface', $registry->get('filesystem1'));
        $this->assertEquals('filesystem2', $registry->get('filesystem2')->getName());

        $this->setExpectedException('Zenstruck\Media\Exception\Exception', 'The filesystem named "foo" is not registered.');
        $registry->get('foo');
    }

    /**
     * @param $name
     *
     * @return FilesystemInterface
     */
    private function createFilesystem($name)
    {
        $filesystem = $this->getMock('Zenstruck\Media\Filesystem\FilesystemInterface');

        $filesystem
            ->expects($this->any())
            ->method('getName')
            ->will($this->returnValue($name))
        ;

        return $filesystem;
    }
}
