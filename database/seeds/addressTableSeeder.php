<?php

use Illuminate\Database\Seeder;

class addressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Address::class , 20)->create();
    }
}
