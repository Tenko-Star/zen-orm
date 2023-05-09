<?php

namespace Test;

use Zen\ORM\Annotation\Migration;
use Zen\ORM\Annotation\Model;
use Zen\ORM\Annotation\WithInject;

#[Model]
#[Migration(
    name: 'user_access',
    describe: '用户第三方关联表',
    settings: [
        'ENGINE' => 'InnoDB'
    ]
)]
class UserAccessModel
{
    #[Migration(
        settings: [
            'AUTO_INCREMENT' => true,
            'PRIMARY KEY' => true
        ]
    )]
    public int $id;

    #[Migration(name: 'user_id', describe: '用户ID')]
    public int $userId;

    #[Migration(name: 'open_id', type: 'varchar(64)', describe: 'openID')]
    public string $openId;

    #[WithInject(key: 'user')]
    public ?UserModel $user;
}