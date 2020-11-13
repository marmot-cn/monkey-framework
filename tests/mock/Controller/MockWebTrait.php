<?php
namespace Marmot\Framework\Controller;

use Marmot\Basecode\Classes\Controller;

class MockWebTrait extends Controller
{
    use WebTrait;

    public function mockInitHook()
    {
        $this->initHook();
    }
}
