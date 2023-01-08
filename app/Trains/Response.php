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
namespace App\Trains;

use App\Enum\HttpCodeEnum;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

trait Response
{
    #[Inject]
    protected ResponseInterface $response;

    /**
     * 成功响应.
     */
    public function success(object|array $data = [], int $code = HttpCodeEnum::HTTP_OK, string $message = 'success'): Psr7ResponseInterface
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data ?: ['serve' => 'api'],
            'time' => time(),
        ])->withStatus(HttpCodeEnum::HTTP_OK);
    }

    /**
     * 失败响应.
     */
    public function fail(string $message = 'success', int $code = HttpCodeEnum::SERVER_ERROR, object|array $data = []): Psr7ResponseInterface
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data ?: ['serve' => 'api'],
            'time' => time(),
        ])->withStatus(HttpCodeEnum::HTTP_OK);
    }
}
