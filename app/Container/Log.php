<?php

declare(strict_types=1);

namespace App\Container;

use Hyperf\Utils\ApplicationContext;
use Hyperf\Logger\LoggerFactory;

class Log
{
    /**
     * 获取日志实例
     * @param string $name
     * @return \Psr\Log\LoggerInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function get(string $name = 'default')
    {
        return ApplicationContext::getContainer()->get(LoggerFactory::class)->get($name);
    }
}