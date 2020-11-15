<?php

namespace Database\Factories;

use App\Models\Builds;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuildsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Builds::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name,
            'link' => 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=221234567765413210000101014mga08713;28;16;45',
            'votes' => $this->faker->numberBetween(-5000, 1000000),
        ];
    }
}
