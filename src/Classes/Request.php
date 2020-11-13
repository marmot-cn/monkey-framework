<?php
//powered by chloroplast
namespace Marmot\Framework\Classes;

use Marmot\Basecode\Classes\Request as BaseRequest;

class Request extends BaseRequest
{
    public function isAjax() : bool
    {
        if (strtolower(Server::get('HTTP_X_REQUESTED_WITH')) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }
}
