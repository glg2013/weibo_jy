<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        // 获取去除掉 ID 为 1 的所有用户 ID 数组
        $folllowers = $users->slice(1);
        $follower_ids = $folllowers->pluck('id')->toArray();

        // 关注出了 1 号用户以为的所有用户
        $user->follow($follower_ids);

        // 除了 1 号用户以为的搜友用户都来关注 1 号用户
        foreach ($folllowers as $folllower) {
            $folllower->follow($user_id);
        }
    }
}
