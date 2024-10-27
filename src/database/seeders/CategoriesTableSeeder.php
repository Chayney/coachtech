<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'element_id' => '1'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'element_id' => '2'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'element_id' => '3'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'element_id' => '4'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'element_id' => '5'
        ];
        DB::table('categories')->insert($param);
    }
}
