<?php
//powered by chloroplast
namespace Marmot\Framework\Classes;

/**
 * 抽象 session, 保存 获取 session
 * @SuppressWarnings(PHPMD.Superglobals)
 */
abstract class Session
{
    private $key;

    protected function __construct(string $key)
    {
        $this->key = $key;
    }

    protected function getKey() : string
    {
        return $this->key;
    }

    public function save($id, $data)
    {
        $key = $this->formatKey($id);

        $_SESSION[$key] = $data;

        return true;
    }

    public function get($id, $defaultValue = '')
    {
        $key = $this->formatKey($id);

        return isset($_SESSION[$key]) ? $_SESSION[$key] : $defaultValue;
    }

    public function del($id)
    {
        $key = $this->formatKey($id);

        unset($_SESSION[$key]);
    }

    protected function formatKey($id) : string
    {
        return $this->getKey().'.'.$id;
    }
}
