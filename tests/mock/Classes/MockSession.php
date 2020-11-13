<?php
namespace Marmot\Framework\Classes;

use Marmot\Framework\Classes\Session;

class MockSession extends Session
{
    public function __construct(string $key)
    {
        parent::__construct($key);
    }

    public function getKey() : string
    {
        return parent::getKey();
    }

    public function formatKey($id) : string
    {
        return parent::formatKey($id);
    }
}
