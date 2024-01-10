<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Release>
 */
class ReleaseFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(nb: 3, asText: true),
            'description' => $this->faker->paragraphs(nb: 2),
            'complete' => $this->faker->boolean(),
            'project_id' => Project::factory()
        ];
    }
}
