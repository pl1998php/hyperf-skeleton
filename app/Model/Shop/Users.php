<?php

namespace App\Model\Shop;

use Hyperf\Database\Model\SoftDeletes;

use Qbhy\HyperfAuth\AuthAbility;
use Qbhy\HyperfAuth\Authenticatable;

class Users extends ShopBaseModel implements Authenticatable
{

    use SoftDeletes,AuthAbility;

    /** @var string 用户主键id */
    protected string $primaryKey = 'user_id';


}