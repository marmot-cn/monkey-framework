<?php
/**
 * marmot_encode 和 marmot_decode 是一套内部加密解密函数,
 * 封装在`php`的底层扩展里面. 如果需要在模板内调用，可以通过如下方式.
 * {'xxxx'|marmot_encode}
 * @author chloroplast
 * @codeCoverageIgnore
 */
function smarty_modifier_marmot_encode($string)
{
    return marmot_encode($string);
}
