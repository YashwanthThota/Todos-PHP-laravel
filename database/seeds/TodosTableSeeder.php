<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //register Todo in the DatabaseSeeder.php
        factory(App\Todo::class, 7)->create();
    }
}
