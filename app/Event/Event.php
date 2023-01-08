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
namespace App\Event;

use Hyperf\AsyncQueue\Event\Event as BaseEvent;
use Hyperf\AsyncQueue\MessageInterface;

class Event extends BaseEvent
{
    public function __construct(public MessageInterface $message)
    {
    }

    public function getMessage(): MessageInterface
    {
        return $this->message;
    }
}
