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
        echo 'GunDamu Seed! ' . PHP_EOL; // I don't know how to spell GunDamu
        Model::unguard();

//        $this->call(SchoolTableSeeder::class);

        Model::reguard();
    }
}
