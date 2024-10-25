<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
            'name' => 'ナルミ',
            'postcode' => '123-4567',
            'address' => '東京都',
            'building' => 'タマホーム'
        ];
        DB::table('profiles')->insert($param);
    }
}
