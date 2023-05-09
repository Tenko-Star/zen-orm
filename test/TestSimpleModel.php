<?php

namespace Test;

use Zen\ORM\Core\ModelParser;
use Zen\ORM\ModelFactory;

class TestSimpleModel extends BaseTestCase
{
    public function testCreateModel()
    {
        $user = ModelFactory::create(UserModel::class, [
            'id' => 1,
            'name' => 'admin',
            'password' => '123456',
            'nickname' => 'admin',
            'avatar' => 'https://img.example.com/1.png',
            'user_access' => [
                'id' => 1,
                'user_id' => 1,
                'open_id' => '123456'
            ]
        ]);

        $this->assertIsObject($user);

        $this->assertInstanceOf(UserModel::class, $user);

        $this->assertEquals($user->userAccess->user->id, $user->id);

        $user2 = ModelFactory::create(UserModel::class, [
            'id' => 1,
            'name' => 'admin',
            'password' => '123456',
            'nickname' => 'admin',
            'avatar' => 'https://img.example.com/1.png',
            'user_access_id' => 1,
            'user_access_user_id' => 1,
            'user_access_open_id' => '123456'
        ]);

        $this->assertIsObject($user2);

        $this->assertInstanceOf(UserModel::class, $user2);

        $this->assertEquals($user2->userAccess->user->id, $user2->id);
    }

    public function testSql()
    {

    }
}
