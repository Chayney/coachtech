<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Element;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::all();
        $elements = Element::all();

        foreach ($items as $item) {
            $assignedElements = $elements->random(rand(1, 2))->pluck('id')->toArray();
            foreach ($assignedElements as $elementId) {
                DB::table('categories')->insert([
                    'item_id' => $item->id,
                    'element_id' => $elementId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}