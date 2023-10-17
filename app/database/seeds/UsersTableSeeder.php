<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salarys = [

            [
                'name' => 'テスト4ユーザー',
                'email' => 'test4@test.com',
                'password' => 'test1234',
                'icon' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'テスト5ユーザー',
                'email' => 'test5@test.com',
                'password' => 'test1234',
                'icon' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'テスト6ユーザー',
                'email' => 'test6@test.com',
                'password' => 'test1234',
                'icon' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'テスト7ユーザー',
                'email' => 'test7@test.com',
                'password' => 'test1234',
                'icon' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'テスト8ユーザー',
                'email' => 'test8@test.com',
                'password' => 'test1234',
                'icon' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'テスト9ユーザー',
                'email' => 'test9@test.com',
                'password' => 'test1234',
                'icon' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'テスト10ユーザー',
                'email' => 'test10@test.com',
                'password' => 'test1234',
                'icon' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ];

        foreach($salarys as $salary) {
            DB::table('users')->insert($salary);
        }
    }
}
