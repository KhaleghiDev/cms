<?php
namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory; 

class FactoryCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Entities\FactoryCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' =>$this->faker->slug,
            'icon' => "fa-brands fa-laravel",
        ];
    }
}

