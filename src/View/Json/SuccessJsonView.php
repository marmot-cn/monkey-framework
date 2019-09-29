<?php
namespace Marmot\Framework\View\Json;

use Marmot\Framework\Interfaces\IView;
use Marmot\Core;

/**
 * 正确模式json格式输出
 *
 * @author chloroplast
 */
class SuccessJsonView extends JsonView implements IView
{
    public function display()
    {
        $data = array();

        $result = array(
            'status' => 1,
            'data' => $data
        );

        return $this->success()->encode($result);
    }
}
