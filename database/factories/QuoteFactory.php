<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    protected $model = Quote::class;

    public function definition(): array
    {
    	return[
                'author'=>$this->faker->word,
                'quote'=>$this->faker->paragraph,
                'book'=>$this->faker->word,
                'year'=>$this->faker->year
    	];
    }
}
