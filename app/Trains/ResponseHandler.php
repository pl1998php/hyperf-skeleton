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

use Hyperf\HttpMessage\Stream\SwooleStream;

trait ResponseHandler
{
    public function getSwooleStream(int $code, string $message, array $data = []): SwooleStream
    {
        return new SwooleStream($this->getJson($code, $message, $data));
    }

    public function getJson(int $code, string $message, array $data = []): string
    {
        return json_encode([
            'code' => $code,
            'message' => $message,
            'data' => $data ?: ['serve' => 'api'],
            'time' => time(),
        ], JSON_UNESCAPED_UNICODE);
    }
}
