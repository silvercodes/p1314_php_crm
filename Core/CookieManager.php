<?php

namespace Core;

use App\Models\User;

class CookieManager
{
    public static ?User $authUser;
    public static function setUserCookie(array $cookie): void
    {
        foreach ($cookie as $key => $val)
            setcookie($key, $val, time() + COOKIE_LIFE_TIME, '/');
    }
    public static function clearCookie(array $cookieKeys): void
    {
        foreach ($cookieKeys as $key)
            setcookie($key, '', 0);
    }

    public static function checkAuth(): bool
    {
        if (! isset($_COOKIE[COOKIE_TOKEN_KEY]))
            return false;

        $token = $_COOKIE[COOKIE_TOKEN_KEY];

        self::$authUser = User::findOne([
            'token' => $token,
        ]);

        return self::$authUser !== null;
    }
}