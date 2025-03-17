<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Task;
use App\Models\Batch;
use App\Models\TimeEntry;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory(10)->create();
        Product::factory(10)->create();
        Task::factory(20)->create();
        Batch::factory(30)->create();
        TimeEntry::factory(200)->create();
    }
}
