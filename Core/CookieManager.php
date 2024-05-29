<?php

namespace Core;

class CookieManager
{
    public static function setUserCookie(array $cookie): void
    {
        foreach ($cookie as $key => $val)
            setcookie($key, $val, time() + COOKIE_LIFE_TIME, '/');
    }
}