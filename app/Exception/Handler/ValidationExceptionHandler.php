<?php

namespace App\Exception\Handler;

use App\Enum\HttpCodeEnum;
use App\Trains\Response;
use Hyperf\Validation\ValidationExceptionHandler as ParentValidationExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ValidationExceptionHandler extends ParentValidationExceptionHandler
{

    use Response;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();
        /** @var \Hyperf\Validation\ValidationException $throwable */
        $body = $throwable->validator->errors()->first();

        return $this->fail($body)
            ->withHeader('Server', 'Hyperf');
//        return $response->withStatus(HttpCodeEnum::HTTP_OK)->json([
//            'code' => HttpCodeEnum::SERVER_ERROR,
//            'message' => $body,
//            'data' => ['t' => time()]
//        ]);
    }
}