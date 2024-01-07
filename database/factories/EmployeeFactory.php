<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        $firstName = fake()->firstName;
        $lastName = fake()->lastName;
        $user = User::factory()->create([
            'name' => $firstName . " " . $lastName,
        ]);

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'date_of_birth' => fake()->date,
            'gender' => fake()->randomElement(['male', 'female']),
            'blood_group' => fake()->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']),
            'email' => $user->email,
            'phone' => fake()->unique()->phoneNumber,
            'joining_date' => fake()->date,
            'department_id' => Department::inRandomOrder()->first()->id,
            'designation_id' => Designation::inRandomOrder()->first()->id,
            'shift_id' => Shift::inRandomOrder()->first()->id,
            'user_id' => $user->id,
        ];
    }
}
