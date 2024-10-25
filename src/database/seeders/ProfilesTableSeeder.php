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
            'image' => '5',
            'name' => '5',
            'postcode' => '商品10',
            'address' => '即購入大丈夫です。',
            'building' => '300'
        ];
        DB::table('products')->insert($param);
    }
}
