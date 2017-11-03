<?php

namespace Nick\Framework;

class Session
{
    const PERMANENT = 'perm';
    const TEMPORARY = 'temp';

    public static function store($key, $value)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION[self::PERMANENT][$key] = $value;
    }

    public static function get($key)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION[self::PERMANENT][$key])){
            return null;
        }

        return $_SESSION[self::PERMANENT][$key];
    }

    public static function setFlash($key, $value)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION[self::TEMPORARY][$key] = $value;
    }

    public static function remove($key)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION[self::PERMANENT][$key]);
    }

    public static function getFlash($key)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION[self::TEMPORARY][$key])){
            return null;
        }

        $value = $_SESSION[self::TEMPORARY][$key];

        unset($_SESSION[self::TEMPORARY][$key]);

        return $value;
    }
}