<?php
namespace Monkey\Framework\Interfaces;

interface ISdk
{
    public function getUri() : string;

    public function getAuthKey() : array;
}
