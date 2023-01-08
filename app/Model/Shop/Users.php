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

use Hyperf\Database\Model\SoftDeletes;
use Qbhy\HyperfAuth\AuthAbility;
use Qbhy\HyperfAuth\Authenticatable;

class Users extends ShopBaseModel implements Authenticatable
{
    use SoftDeletes;
    use AuthAbility;

    /** @var string 用户主键id */
    protected string $primaryKey = 'user_id';
}
