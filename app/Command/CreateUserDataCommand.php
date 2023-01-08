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
namespace App\Command;

use App\Model\Shop\Users;
use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Psr\Container\ContainerInterface;

#[Command]
class CreateUserDataCommand extends HyperfCommand
{
    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('create:user:info:data');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('创建虚拟用户');
    }

    public function handle()
    {
        if (Users::where('phone', '13678900001')->doesntExist()) {
            Users::create([
                'nick_name' => 'latent',
                'name' => 'latent',
                'phone' => '1367890x00',
                'avatar' => 'https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/100x100',
                'password' => passwordHash(123456),
                'wx_open_id' => 'xxx',
                'wx_union_id' => 'xxx',
                'vip_end_time' => 0,
                'login_ip' => '127.0.0.1',
                'login_time' => time(),
            ]);
        }
        $this->info('账号：13678900001 密码：123456');
    }
}
