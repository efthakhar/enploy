<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $departments = [
        'IT', "Accounts", "Admin", "Production", "Marketing", "Sales", "HRM",
    ];

    public $designations = ['General Manager', "Assistant General Manager", "Assitant Manager", "Manager", 'IT Head', "Chemist", "Chief Chemist", "Lab Head", "Security Specialist", "Security Engineer", "Electrical Engineer", "Computer Operator", "Civil Engineer"];

    public $shifts = ['Day Shift Company', "Day Shift Factory", "Night Shift Factory"];

    public function run(): void
    {
        collect($this->departments)->each(function ($name) {
            Department::create(['name' => $name]);
        });

        collect($this->designations)->each(function ($name) {
            Designation::create(['name' => $name]);
        });

        collect($this->shifts)->each(function ($name) {
            Shift::create(['name' => $name]);
        });

        Employee::factory()->count(1000)->create();
    }
}
