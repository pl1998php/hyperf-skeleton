<?php

declare(strict_types=1);

namespace App\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;

#[Command]
class InitializationCommand extends HyperfCommand
{
    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('init:application');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('初始化应用');
    }

    public function handle()
    {
        $this->call('gen:auth-env');
        $this->info('执行代码迁移');
        $this->call('migrate');
        $this->call('create:user:info:data');
    }
}
