<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        // DB::table('timelines')->insert([
        //     'id'         => 1,
        //     'user_id'    => 1,
        //     'timeline'   => [
        //        ["朝会","書類整理","作業時間","昼休憩","作業時間","定例会議","夕会"],
        //        ["朝会","事務処理","作業時間","昼休憩","作業時間","定例会議","夕会"],
        //        ["朝会","外部会議","作業時間","昼休憩","作業時間","定例会議","夕会"],
        //        ["朝会","作業時間","作業時間","昼休憩","作業時間","定例会議","夕会"],
        //        ["朝会","事務処理","作業時間","昼休憩","作業時間","定例会議","夕会"],
        //    ],
        //     'deleted_at' => 0,
        // ]);
    }
}
