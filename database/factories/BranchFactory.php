<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'branch_name'=>$this->faker->name(),
            'branch_email'=>$this->faker->unique()->safeEmail(),
            'branch_phone'=>$this->faker->name(),
            'branch_address'=>$this->faker->name(),
            'branch_city'=>$this->faker->name(),
            'branch_state'=>$this->faker->name(),
            'branch_pin'=>$this->faker->name(),
            'branch_country'=>$this->faker->name(),
        ];
    }
}
