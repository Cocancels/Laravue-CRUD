<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'client_id' => Client::inRandomOrder()->first()->id,
         'nom_responsable_projet'=> $this->faker->lastName,
         'prenom_responsable_projet'=> $this->faker->firstName(),
         'telephone_responsable_projet'=>$this->faker->randomNumber(8),
         'mail_responsable_projet'=> $this->faker->unique()->companyEmail ,
         'titre_projet'=>$this->faker->unique()->word(10),
         'description_projet'=>$this->faker->text(50),
         'debut_projet'=>$this->faker->date('Y-m-d',),
         'fin_projet'=>$this->faker->date('Y-m-d'),
         'status_projet'=>$this->faker->randomElement(['Terminé', 'En cours', 'Annulé']),
         'jours_vendus_projet'=>$this->faker->randomNumber(2),


        ];
    }
}
