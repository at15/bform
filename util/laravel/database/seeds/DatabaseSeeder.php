<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo 'Seed! ' . PHP_EOL;
        Model::unguard();

//        $this->call(SchoolTableSeeder::class);

        Model::reguard();
    }
}
