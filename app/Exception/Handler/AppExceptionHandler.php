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
namespace App\Exception\Handler;

use App\Enum\HttpCodeEnum;
use App\Trains\ResponseHandler;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Exception\NotFoundHttpException;
use Psr\Http\Message\ResponseInterface;

class AppExceptionHandler extends ExceptionHandler
{
    use ResponseHandler;

    public function __construct(protected StdoutLoggerInterface $logger)
    {
    }

    public function handle(\Throwable $throwable, ResponseInterface $response): ResponseInterface
    {
        $this->logger->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()));
        $this->logger->error($throwable->getTraceAsString());

        if ($throwable instanceof NotFoundHttpException) {
            return $response->withBody($this->getSwooleStream(HttpCodeEnum::NOT_FOUND, '路由不存在'));
        }
        return $response->withBody($this->getSwooleStream(HttpCodeEnum::SERVER_ERROR, '服务异常'), [
            'line' => $throwable->getLine(),
            'file' => $throwable->getFile(),
            'message' => $throwable->getMessage(),
        ]);
    }

    public function isValid(\Throwable $throwable): bool
    {
        return true;
    }
}
