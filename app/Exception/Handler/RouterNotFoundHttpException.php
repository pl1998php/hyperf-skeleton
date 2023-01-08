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
use Hyperf\HttpMessage\Exception\NotFoundHttpException;
use Hyperf\HttpMessage\Server\Response;

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
            $message = 'Error';
        }
        return $this->getJson(HttpCodeEnum::SERVER_ERROR, $message);
    }
}
