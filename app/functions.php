<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
if (! function_exists('passwordHash')) {
    /**
     * 加密方法.
     * @return string
     */
    function passwordHash(string|int $pwd)
    {
        return password_hash((string) $pwd, PASSWORD_DEFAULT);
    }
}
