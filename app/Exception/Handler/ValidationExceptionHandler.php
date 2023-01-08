<?php

namespace App\Exception\Handler;

use App\Enum\HttpCodeEnum;
use Hyperf\Validation\ValidationExceptionHandler as ParentValidationExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use App\Trains\ResponseHandler;

class ValidationExceptionHandler extends ParentValidationExceptionHandler
{
    use ResponseHandler;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();
        /** @var \Hyperf\Validation\ValidationException $throwable */
        $body = $throwable->validator->errors()->first();
        return $response->withBody($this->getSwooleStream(HttpCodeEnum::SERVER_ERROR,$body));
    }
}