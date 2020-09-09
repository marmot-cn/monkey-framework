<?php
namespace Marmot\Framework\View\Json;

class MockJsonView extends JsonView
{
    public function getData()
    {
        return parent::getData();
    }

    public function getResult() : array
    {
        return parent::getResult();
    }

    public function encode(array $data = array()) : void
    {
        parent::encode($data);
    }
}
