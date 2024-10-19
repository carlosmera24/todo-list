<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::insert([
            [
                'name' => 'Set up a Laravel Project with Vue and Pinia Integration'
            ],
            [
                'name' => 'Create CRUD Operations with Laravel API and Vue Frontend'
            ],
            [
                'name' => 'State Management with Pinia: Global Store Example'
            ],
            [
                'name' => 'User Authentication with Laravel Sanctum and Vue'
            ],
            [
                'name' => 'Form Validation using Laravel Backend and Vue Frontend'
            ],
            [
                'name' => 'Handling Errors with Pinia Stores and Laravel API Responses'
            ],
            [
                'name' => 'Deploy Laravel-Vue Project on a Production Server'
            ],
        ]);
    }
}
