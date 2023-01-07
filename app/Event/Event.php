<?php

declare(strict_types=1);

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