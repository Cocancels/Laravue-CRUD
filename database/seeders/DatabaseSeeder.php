<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Projet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Schema::disableForeignKeyConstraints();
      DB::table('projets')->truncate();
      Client::factory(10)->create();
      Projet::factory(10)->create();
      Schema::enableForeignKeyConstraints();
    }
}
