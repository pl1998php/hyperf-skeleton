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
namespace App\Enum;

/**
 * 数据库配置枚举.
 */
enum DatabaseEnum
{
    /** @var string 商品库 */
    public const SHOP_CONNECTION = 'shop';

    /** @var string 后台库 */
    public const ADMIN_CONNECTION = 'default';
}
