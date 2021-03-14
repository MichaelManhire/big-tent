<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Heart;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Heart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $heartableType = $this->getHeartableType();
        $heartableId = $this->getHeartableId($heartableType);

        return [
            'user_id' => User::all()->random()->id,
            'heartable_id' => $heartableId,
            'heartable_type' => $heartableType,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Get the model's heartable type.
     *
     * @return string
     */
    public function getHeartableType()
    {
        return $this->faker->boolean() ? 'App\Models\Post' : 'App\Models\Comment';
    }

    /**
     * Get the model's heartable id.
     *
     * @return integer
     */
    public function getHeartableId($type)
    {
        if ($type === 'App\Models\Post') {
            return Post::all()->random()->id;
        }

        return Comment::all()->random()->id;
    }
}
