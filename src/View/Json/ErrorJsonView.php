<?php
namespace Marmot\Framework\View\Json;

use Marmot\Interfaces\IView;
use Marmot\Core;

/**
 * 错误情况json格式输出
 *
 * @author chloroplast
 */
class ErrorJsonView extends JsonView implements IView
{
    public function display() : void
    {
        $error = Core::getLastError();
        $data = array(
            'id'=>$error->getId(),
            'title'=>$error->getTitle(),
            'code'=>$error->getCode(),
            'detail'=>$error->getDetail(),
            'source'=>$error->getSource()
        );

        $this->failure()->encode($data);
    }
}
