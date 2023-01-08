<?php

namespace App\Exception\Handler;

use App\Enum\HttpCodeEnum;
use Hyperf\HttpMessage\Exception\NotFoundHttpException;
use Hyperf\HttpMessage\Server\Response;
use App\Trains\ResponseHandler;

class RouterNotFoundHttpException extends NotFoundHttpException
{
    use ResponseHandler;

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName(): string
    {
        $message = Response::getReasonPhraseByCode($this->statusCode);
        if (! $message) {
            $message =  'Error';
        }
        return $this->getJson(HttpCodeEnum::SERVER_ERROR,$message);
    }
}