<?php
namespace Monkey\Framework\View\Json;

use Monkey\Framework\Interfaces\IView;
use Marmot\Core;

/**
 * 错误情况json格式输出
 *
 * @author chloroplast
 */
class ErrorJsonView extends JsonView implements IView
{
    public function display()
    {
        $error = Core::getLastError();
        $data = array(
            'id'=>$error->getId(),
            'title'=>$error->getTitle(),
            'code'=>$error->getCode(),
            'detail'=>$error->getDetail(),
            'source'=>$error->getSource()
        );

        return $this->failure()->encode($data);
    }
}
