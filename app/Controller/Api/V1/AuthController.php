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
namespace App\Controller\Api\V1;

use App\Controller\ApiController;
use App\Middleware\Api\AuthMiddleware;
use App\Request\Api\AuthRequest;
use App\Services\Auth\AuthService;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\RequestMapping;

#[Controller]
class AuthController extends ApiController
{
    public function register()
    {
    }

    /**
     * 登录.
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   11:05
     */
    #[RequestMapping(path: 'login', methods: 'post')]
    public function login(AuthService $authService)
    {
        $request = $this->container->get(AuthRequest::class);
        $request->scene('login')->validateResolved();

        $params = $request->post();

        try {
            $data = $authService->login($params);
            return $this->success($data);
        } catch (\Throwable $throwable) {
            return $this->fail($throwable->getMessage(), 200, [
                'line' => $throwable->getLine(),
                'file' => $throwable->getFile(),
                'message' => $throwable->getMessage(),
            ]);
        }
    }

    /**
     * 获取用户信息.
     * @return \Psr\Http\Message\ResponseInterface
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   11:10
     */
    #[RequestMapping(path: 'me', methods: 'get')]
    #[Middleware(AuthMiddleware::class)]
    public function me(AuthService $authService)
    {
        $data = $authService->getUser();
        return $this->success($data);
    }
}
