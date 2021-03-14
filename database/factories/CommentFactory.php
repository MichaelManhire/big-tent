<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'commentable_id' => Post::all()->random()->id,
            'commentable_type' => 'App\Models\Post',
            'body' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Indicate that the comment is a reply.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function reply()
    {
        return $this->state(function (array $attributes) {
            return [
                'commentable_id' => Comment::all()->random()->id,
                'commentable_type' => 'App\Models\Comment',
            ];
        });
    }
}
