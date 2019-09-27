<?php
//powered by chloroplast
namespace Monkey\Framework\Classes;

use Marmot\Basecode\Classes\Response as BaseResponse;

class Response extends BaseResponse
{
    const FORMAT_JSON_API = 'jsonapi';

    public $format = self::FORMAT_JSON_API;

    public $formatters = [self::FORMAT_JSON_API => 'Monkey\Framework\View\JsonApiResponseFormatter'];
}
