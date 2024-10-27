<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementsTableSeeder extends Seeder
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
        DB::table('elements')->insert($param);

        $param = [
            'name' => 'ゲーム'
        ];
        DB::table('elements')->insert($param);

        $param = [
            'name' => '本'
        ];
        DB::table('elements')->insert($param);

        $param = [
            'name' => 'スマホ'
        ];
        DB::table('elements')->insert($param);

        $param = [
            'name' => 'コスメ'
        ];
        DB::table('elements')->insert($param);
    }
}
