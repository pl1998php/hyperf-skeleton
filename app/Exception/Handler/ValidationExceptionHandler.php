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
use Hyperf\Validation\ValidationExceptionHandler as ParentValidationExceptionHandler;
use Psr\Http\Message\ResponseInterface;

class ValidationExceptionHandler extends ParentValidationExceptionHandler
{
    use ResponseHandler;

    public function handle(\Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();
        /** @var \Hyperf\Validation\ValidationException $throwable */
        $body = $throwable->validator->errors()->first();
        return $response->withBody($this->getSwooleStream(HttpCodeEnum::SERVER_ERROR, $body));
    }
}
