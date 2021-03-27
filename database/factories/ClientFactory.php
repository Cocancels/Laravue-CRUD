<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description_client'=>$this->faker->text(50),
            'raison_sociale_client'=>$this->faker->company,
            'statut_juridique_client'=>$this->faker->randomElement(['EURL', 'EIRL', 'SASU','SAS','SA','SNC','SARL']),
            'capital_client'=>$this->faker->randomNumber(5),
            'siret_numero_client'=>$this->faker->randomNumber(8),
            'naf_code_client'=>$this->faker->randomNumber(5),
            'pays_siege_client'=>$this->faker->country,
            'adresse_siege_client'=>$this->faker->address,
            'code_postal_siege_client'=>$this->faker->randomNumber(5),
            'ville_siege_client'=>$this->faker->city,

        ];
    }
}
