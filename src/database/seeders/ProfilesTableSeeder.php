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
            'image' => 'images/product7.jpg',
            'name' => '管理者',
            'postcode' => '111-1111',
            'address' => '東京都',
            'building' => 'タマホーム',
            'pay' => '1'
        ];
        DB::table('profiles')->insert($param);

        $param = [
            'user_id' => '2',
            'image' => 'images/product4.jpg',
            'name' => 'test',
            'postcode' => '123-4567',
            'address' => '福岡県',
            'building' => 'レオパレス',
            'pay' => '1'
        ];
        DB::table('profiles')->insert($param);
    }
}
