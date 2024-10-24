<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'ファッション'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => 'ゲーム'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '本'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => 'スマホ'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => 'コスメ'
        ];
        DB::table('items')->insert($param);
    }
}
