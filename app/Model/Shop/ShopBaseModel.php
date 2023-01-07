<?php

declare(strict_types=1);

namespace App\Model\Shop;

use App\Enum\DatabaseEnum;
use App\Model\Model;

class ShopBaseModel extends Model
{
    /** @var string|null 数据库配置 */
    public ?string $connection = DatabaseEnum::SHOP_CONNECTION;

    protected array $guarded = [];

}