<?php

namespace Zenstruck\Media\Test;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function getFixtureFileDir()
    {
        return __DIR__.'/../../../fixtures/files/';
    }
}
