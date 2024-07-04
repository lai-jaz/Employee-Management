<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        $departments = ['Accounts', 'Sales', 'HR', 'IT', 'Marketing']; // 0 to 4 index
        $salaryFloat = $faker->randomFloat(2, 20000.00, 80000.00);
        $salaryFloatRounded = round($salaryFloat, -3); // round to nearest 10,000

        return [
           'fName' => $faker->firstName(),
            'lName' => $faker->lastName(),
            'email' => $faker->unique()->safeEmail,
            'phoneNo' => $faker->numerify('###-###-####'),
            'address' => $faker->address(),
            'DOB' => $faker->date('y-m-d', '2003-07-31'),
            'salary' => $salaryFloatRounded,
            'Department' => $departments[$faker->numberBetween(0, 4)],
        ];
    }
}
