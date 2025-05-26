<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'fengniancong';
        $user->email = 'fengniancong@example.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user = User::find(2);
        $user->name = 'honglang';
        $user->email = 'honglang@example.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
