<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // TODO: better use a model
        DB::table('users')->insert([
            'name' => 'admin',
            'display_name' => 'jack',
            'email' => 'jack@10086.com',
            'password' => sha1('bform'),
            'role' => Bform\Constant::USER_ADMIN,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
