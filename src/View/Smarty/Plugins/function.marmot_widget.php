<?php
/**
 * widget组件应用在如下场景:
 * 模板有很多通用的页面, 为了避免代码复制, 可以通过widget模式复用
 *
 * 调用方式: {marmot_widget widget="xxxController" func=函数 parameters=参数}
 * 1. xxxController 对应的Controller
 * 2. func 是函数名字
 * 3. parameters 传参名字
 * 该Controller正常输出TemplateView即可
 *
 * @author chloroplast
 * @codeCoverageIgnore
 */
function smarty_function_marmot_widget($args)
{
    $widget = new $args['widget']();
    $func = $args['func'];

    if (isset($args['parameters'])) {
        $widget->$func($args['parameters']);
    }

    if (!isset($args['parameters'])) {
        $widget->$func();
    }
}
