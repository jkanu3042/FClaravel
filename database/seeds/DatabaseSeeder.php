<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \App\User::truncate();
        \App\Post::truncate();

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);

        // 다시 외래키 확인 옵션을 켭니다.
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
