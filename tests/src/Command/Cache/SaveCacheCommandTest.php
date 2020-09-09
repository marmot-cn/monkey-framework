<?php
namespace Marmot\Framework\Command\Cache;

use PHPUnit\Framework\TestCase;

class SaveCacheCommandTest extends TestCase
{
    protected $key = 'test';
    protected $time = 1;
    protected $data = 'data';

    public function setUp()
    {
        $this->command = new SaveCacheCommand($this->key, $this->data, $this->time);
    }

    public function tearDown()
    {
        unset($this->command);
    }

    public function testExtendsBaseSaveCacheCommand()
    {
        $this->assertInstanceOf(
            'Marmot\Basecode\Command\Cache\SaveCacheCommand',
            $this->command
        );
    }
}
