<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class RequestsTableSeeder extends Seeder
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
                'user_id' => 11,
                'service_id' => 21,
                'content' => '子ども2人でお受けしたいのですが、
                近くに公園がありますのでそちらでも大丈夫でしょうか。',
                'tel' => '09012345678',
                'email' => 'test1@test.com',
                'deadline' => '2023-12-31',
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'service_id' => 22,
                'content' => 'チームでお受けしたいです、時間は17時から19時まででお願いできますか。',
                'tel' => '09012345678',
                'email' => 'test1@test.com',
                'deadline' => '2023-12-31',
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 13,
                'service_id' => 23,
                'content' => '一度お願いしたことがありまして、子供たちの反響がよかったのでもう一度お願いできますでしょうか。',
                'tel' => '09012345678',
                'email' => 'test1@test.com',
                'deadline' => '2023-12-31',
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 14,
                'service_id' => 24,
                'content' => '初めての依頼になりまして、時間や場所は相談しながらできたらと思います。
                子供1人（男子）と保護者の参加になりますが大丈夫でしょうか。',
                'tel' => '09012345678',
                'email' => 'test1@test.com',
                'deadline' => '2023-12-31',
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 15,
                'service_id' => 25,
                'content' => '同じスキルシェアをしているものでして、勉強のために依頼をしてよろしいでしょうか。',
                'tel' => '09012345678',
                'email' => 'test1@test.com',
                'deadline' => '2023-12-31',
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],



        ];

        foreach($salarys as $salary) {
            DB::table('Requests')->insert($salary);
        }
    }
}
