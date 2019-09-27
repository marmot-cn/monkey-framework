<?php
//powered by chloroplast
namespace Monkey\Framework\Classes;

use Marmot\Basecode\Classes\Request as BaseRequest;

class Request extends BaseRequest
{
    public function isAjax() : bool
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }
}
