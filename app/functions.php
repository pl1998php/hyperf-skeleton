<?php

declare(strict_types=1);


if (!function_exists('passwordHash')) {
    /**
     * 加密方法
     * @param string|int $pwd
     * @return string
     */
    function passwordHash( string | int $pwd)
    {
        return password_hash( (string)$pwd,PASSWORD_DEFAULT);
    }
}