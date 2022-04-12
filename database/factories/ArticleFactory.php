<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'motCle' => implode(',', $this->faker->words($nb = 3, $asText = false)),
            'resume' => $this->faker->paragraph($nbSentences = 4, $variableNbSentences = true),
            'contenu' => $this->faker->paragraphs($nb = 8, $asText = true),
            'active' => true,
        ];
    }
}
