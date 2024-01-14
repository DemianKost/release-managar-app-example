<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\Release;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Release::factory(10)->create();

        Project::factory(10)->create([
            'user_id' => User::factory()->create([
                'email' => 'test@example.com'
            ])
        ]);
    }
}
