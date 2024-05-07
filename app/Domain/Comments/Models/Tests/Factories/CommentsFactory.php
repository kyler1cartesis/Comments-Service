<?php

namespace App\Domain\Comments\Models\Tests\Factories;

use App\Domain\Comments\Models\Comment;
use Ensi\LaravelTestFactories\BaseModelFactory;

class CommentsFactory extends BaseModelFactory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->uuid(),
            'step_id' => $this->faker->uuid(),
            'text' => 'Test comment',
            'parent_id' => $this->faker->numberBetween(0, 10_000),
        ];
    }
}
