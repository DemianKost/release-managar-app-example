<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(nb: 4, asText: true),
            'description' => $this->faker->paragraphs(nb: 4, asText: true),
            'active' => $this->faker->boolean(),
            'user_id' => fn() => User::factory(),
        ];
    }
}
