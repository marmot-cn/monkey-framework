<?php
namespace Marmot\Framework\View\Json;

use Marmot\Interfaces\IView;
use Marmot\Core;

/**
 * 正确模式json格式输出
 *
 * @author chloroplast
 */
class SuccessJsonView extends JsonView implements IView
{
    public function display() : void
    {
        $data = array();
        
        $this->success()->encode($data);
    }
}
