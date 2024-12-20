<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ElementsTableSeeder::class,
            ConditionsTableSeeder::class,
            UsersTableSeeder::class,
            ProfilesTableSeeder::class,
            ItemsTableSeeder::class,
            CategoriesTableSeeder::class,
            CommentsTableSeeder::class,
            PurchasesTableSeeder::class,
        ]);
    }
}
