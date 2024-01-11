<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Project;
use App\Models\Release;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(nb: 5),
            'description' => $this->faker->paragraphs(nb: 6, asText: true),
            'criteria' => $this->faker->boolean() ? $this->faker->paragraphs(nb: 10, asText: true) : null,
            'complete' => $this->faker->boolean(),
            'project_id' => Project::factory(),
            'release_id' => $this->faker->boolean() ? Release::factory() : null,
        ];
    }
}
