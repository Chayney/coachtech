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
            'condition_id' =>'1',
            'name' => 'product1',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '2',
            'category_id' => '2',
            'condition_id' =>'2',
            'name' => 'product2',
            'description' => '即購入大丈夫です。',
            'price' => '400',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '3',
            'category_id' => '3',
            'condition_id' =>'3',
            'name' => 'product3',
            'description' => '即購入大丈夫です。',
            'price' => '500',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '4',
            'category_id' => '4',
            'condition_id' =>'4',
            'name' => 'product4',
            'description' => '即購入大丈夫です。',
            'price' => '600',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '5',
            'category_id' => '5',
            'condition_id' =>'5',
            'name' => 'product5',
            'description' => '即購入大丈夫です。',
            'price' => '700',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '1',
            'condition_id' =>'1',
            'name' => 'product1',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '1',
            'condition_id' =>'1',
            'name' => 'product1',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '1',
            'condition_id' =>'1',
            'name' => 'product1',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '1',
            'condition_id' =>'1',
            'name' => 'product1',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg'
        ];
        DB::table('products')->insert($param);

        $param = [
            'profile_id' => '1',
            'category_id' => '1',
            'condition_id' =>'1',
            'name' => 'product1',
            'description' => '即購入大丈夫です。',
            'price' => '300',
            'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'
        ];
        DB::table('products')->insert($param);
    }
}
