<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class StatusesTableSeeder extends Seeder
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
                'choice' => '掲載中',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'choice' => '進行中',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'choice' => '完了',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        foreach($salarys as $salary) {
            DB::table('Statuses')->insert($salary);
        }
    }
}
