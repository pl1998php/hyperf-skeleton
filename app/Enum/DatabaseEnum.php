<?php

namespace App\Enum;

/**
 * 数据库配置枚举
 */
enum DatabaseEnum
{
    /** @var string 商品库 */
    public const SHOP_CONNECTION = 'shop';

    /** @var string  后台库 */
    public const ADMIN_CONNECTION = 'default';
}
