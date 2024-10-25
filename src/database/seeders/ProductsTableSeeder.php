<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'profile_id' => '1',
            'category_id' => '1',
            'condition_id' => '1',
            'name' => '商品1',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => ''
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '2',
            'condition_id' => '3',
            'name' => '商品2',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '3',
            'condition_id' => '3',
            'name' => '商品3',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '4',
            'condition_id' => '4',
            'name' => '商品4',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '5',
            'condition_id' => '5',
            'name' => '商品5',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '1',
            'condition_id' => '1',
            'name' => '商品6',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '2',
            'condition_id' => '2',
            'name' => '商品7',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '3',
            'condition_id' => '3',
            'name' => '商品8',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '4',
            'condition_id' => '4',
            'name' => '商品9',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '5',
            'condition_id' => '5',
            'name' => '商品10',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'ファッション'
        ];
        DB::table('products')->insert($param);
    }
}
