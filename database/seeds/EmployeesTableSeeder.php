<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class, 1)->create([
            'position' => 'team lead',
            'salary' => 150000,
            'director_id' => null,
        ])->each(function (Employee $e) {
            $e->subordinates()->saveMany(factory(App\Employee::class, 10)->create([
                'position' => 'senior developer',
                'salary' => 100000,
                'director_id' => "$e->id"
            ])->each(function (Employee $e) {
                $e->subordinates()->saveMany(factory(App\Employee::class, 5)->create([
                    'position' => 'middle developer',
                    'salary' => 50000,
                    'director_id' => "$e->id"
                ])->each(function(Employee $e) {
                    $e->subordinates()->saveMany(factory(App\Employee::class, 5)->create([
                        'position' => 'junior developer',
                        'salary' => 25000,
                        'director_id' => "$e->id"
                    ])->each(function(Employee $e) {
                        $e->subordinates()->saveMany(factory(App\Employee::class, 2)->create([
                            'position' => 'trainee developer',
                            'salary' => 10000,
                            'director_id' => "$e->id"
                        ]));
                    }));
                }));
            }));
        });
    }
}
