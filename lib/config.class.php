<?php

class Config{

    protected static $config = [];

    public static function setConfig($set, $val)
    {
        self::$config[$set] = $val;
    }

    public static function getConfig($set)
    {
        return isset(self::$config[$set]) ? self::$config[$set] : null;
    }

}