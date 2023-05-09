<?php

namespace Test;

use Zen\ORM\Annotation\WithInject;
use Zen\ORM\Annotation\Migration;
use Zen\ORM\Annotation\Model;

#[Model]
#[Migration(
    name: 'user',
    describe: '用户表',
    settings: [
        'ENGINE' => 'InnoDB'
    ])
]
class UserModel
{
    #[Migration(
        settings: [
            'AUTO_INCREMENT' => true,
            'PRIMARY KEY' => true
        ]
    )]
    public int $id;

    #[Migration(type: 'varchar(64) NOT NULL', describe: '用户名')]
    public string $name;

    #[Migration(type: 'varchar(64)', describe: '密码')]
    public string $password;

    #[Migration(type: 'varchar(32)', describe: '昵称')]
    public string $nickname;

    #[Migration(describe: '头像')]
    public string $avatar;

    #[WithInject(key: 'user_access')]
    public ?UserAccessModel $userAccess;

    public function setPassword(string $password)
    {
        $this->password = md5($password);
    }

    public function getAvatar(): string
    {
        return 'https://img.example.com/' . $this->avatar;
    }

    public function setAvatar(string $avatar)
    {
        $this->avatar = str_replace('https://img.example.com/', '', $avatar);
    }
}