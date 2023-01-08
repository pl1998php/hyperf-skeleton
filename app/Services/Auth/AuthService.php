<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Enum\UserEnum;
use App\Model\Shop\Users;


class AuthService
{
    use AuthTrains;

    /** @var string  */
    public $guard = UserEnum::API_JWT;


    /**
     * @param array $params
     * @return array|\Exception
     * @throws \Exception
     */
    public function login(array $params) :array | \Exception
    {
        $users = Users::where('phone',$params['phone'])->first();
        if(!$users) {
            throw new \Exception('用户不存在');
        }
        if(!password_verify($params['password'],$users->password)) {
            throw new \Exception('密码错误');
        }
        return $this->getData($users);
    }

    /**
     * @return array
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   11:07
     */
    public function getUser()
    {
        $user = $this->auth->guard($this->guard)->user();
        return  $this->getData($user);
    }


}