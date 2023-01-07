<?php

declare(strict_types=1);

namespace App\Model\Shop;

use App\Model\Model;

class ShopBaseModel extends Model
{
    /** @var string|null 数据库配置 */
    public ?string $connection = 'shop';
}