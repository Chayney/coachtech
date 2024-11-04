<?php

namespace Database\Factories;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Comment;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        do {
            $profileId = Profile::inRandomOrder()->first()->id;
            $itemId = Item::inRandomOrder()->first()->id;

            $exists = Comment::where('profile_id', $profileId)
                ->where('item_id', $itemId)
                ->exists();
        } while ($exists);

        $faker = app(Faker::class);
        $comments = [
            'お値下げ可能ですか。',
            'キズはありますか。',
            '購入希望です。',
            'どのくらい使用しましたか。',
            '他の写真も追加できますか。'
        ];

        return [
            'profile_id' => $profileId,
            'item_id' => $itemId,
            'comment' => $faker->randomElement($comments),
        ];
    }
}
