<?php

declare(strict_types=1);

namespace App\Controller\Api\V1\Auth;

use App\Controller\ApiController;
use App\Model\Shop\Users;
use App\Request\Api\AuthRequest;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Qbhy\HyperfAuth\AuthManager;

#[Controller]
class AuthController extends ApiController
{
    /**
     * @Inject
     * @var AuthManager
     */
    protected $auth;

    public function register()
    {

    }

    #[RequestMapping(path: "login", methods: "post")]
    public function login()
    {
        $request = $this->container->get(AuthRequest::class)->scene('login');
        $request->validateResolved();

        $params = $request->post();

        $users = Users::where('phone',$params['phone'])->first();
        if(!$users) {
            return $this->fail('用户不存在');
        }
        if(!password_verify($params['password'],$users->password)) {
            return $this->fail('密码错误');
        }
        return $this->success([
           'token' => $this->auth->guard('shop')->login($users),
            'user_id' => $users->user_id,
            'avatar' => $users->avatar,
            'nick_name' => $users->nick_name,
            'name' => $users->name,
            'phone' => $users->phone,
            'wx_open_id' => $users->wx_open_id,
            'wx_union_id' => $users->wx_union_id,
        ]);
    }

    public function me()
    {

    }
}