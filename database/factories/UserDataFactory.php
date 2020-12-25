<?php

namespace Database\Factories;

use App\Models\UserData;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'profile_picture_path' => 'https://source.unsplash.com/collection/' . Str::random(5) . '/400x400'
        ];
    }
}
