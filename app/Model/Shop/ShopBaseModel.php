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
namespace App\Model\Shop;

use App\Enum\DatabaseEnum;
use App\Model\Model;

class ShopBaseModel extends Model
{
    /** @var null|string 数据库配置 */
    public ?string $connection = DatabaseEnum::SHOP_CONNECTION;

    protected array $guarded = [];
}
