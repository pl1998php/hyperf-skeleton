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
namespace App\Middleware\Api;

use App\Enum\HttpCodeEnum;
use App\Enum\UserEnum;
use App\Trains\ResponseHandler;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Qbhy\HyperfAuth\AuthManager;

class AuthMiddleware implements MiddlewareInterface
{
    use ResponseHandler;

    /** @var HttpResponse */
    protected $response;

    /** @var AuthManager */
    protected $authManager;

    public function __construct(protected ContainerInterface $container, AuthManager $authManager, HttpResponse $response)
    {
        $this->authManager = $authManager;
        $this->response = $response;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $guard = $this->authManager->guard(UserEnum::API_JWT);

        if (! $guard->check()) {
            return $this->response
                ->withStatus(HttpCodeEnum::UNAUTHORIZED)
                ->withBody(
                    $this->getSwooleStream(HttpCodeEnum::UNAUTHORIZED, '请登录,在操作!')
                );
        }
        $guard->user();

        return $handler->handle($request);
    }
}
