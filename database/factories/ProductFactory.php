<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text,
            'cat_id' => $this->faker->randomElement(Category::where('is_parent', 1)->pluck('id')->toArray()),
            'child_cat_id' => $this->faker->randomElement(Category::where('is_parent', 0)->pluck('id')->toArray()),
            'photo' => $this->faker->imageUrl('400', '200'),
            'price' => $this->faker->numberBetween(100, 1000),
            'status' => $this->faker->randomElement(['active', 'inactive']),

        ];
    }
}
