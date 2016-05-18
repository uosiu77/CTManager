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
        //$this->call(UserTableSeeder::class);

        DB::table('users')->insert([
            'first_name' => 'Maciej',
            'last_name' => 'Maciejewski',
            'substitute_id' => '0',
            'username' => 'mac',
            'email' => 'm.maciejewski@ctmarine.com.pl',
            'password' => bcrypt('secret'),
        ]);
    }
}
