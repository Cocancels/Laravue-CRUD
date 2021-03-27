<?php

namespace Database\Seeders;

use App\Models\User;
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
      DB::table('clients')->truncate();
      DB::table('users')->truncate();
      Client::factory(5)->create();
      Projet::factory(20)->create();
      User::factory(1)->create();
      Schema::enableForeignKeyConstraints();
    }
}
