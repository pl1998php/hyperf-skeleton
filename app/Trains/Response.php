<?php

declare(strict_types=1);

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
     * 成功响应
     * @param object|array $data
     * @param int $code
     * @param string $message
     * @return Psr7ResponseInterface
     */
    public function success(object|array $data = [], int $code = HttpCodeEnum::HTTP_OK, string $message = 'success'): Psr7ResponseInterface
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data ?? ['t' => time()],
            'time' => time()
        ])->withStatus(HttpCodeEnum::HTTP_OK);
    }

    /**
     * 失败响应
     * @param string $message
     * @param int $code
     * @param object|array $data
     * @return Psr7ResponseInterface
     */
    public function fail(string $message = 'success', int $code = HttpCodeEnum::SERVER_ERROR, object|array $data = []): Psr7ResponseInterface
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data ?? ['t' => time()],
            'time' => time()
        ])->withStatus(HttpCodeEnum::SERVER_ERROR);
    }

}
