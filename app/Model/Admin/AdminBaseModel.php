<?php

declare(strict_types=1);

namespace App\Model\Admin;

use App\Enum\DatabaseEnum;
use App\Model\Model;


class AdminBaseModel extends Model
{
    /** @var string|null 数据库配置 */
    public ?string $connection = DatabaseEnum::ADMIN_CONNECTION;
}