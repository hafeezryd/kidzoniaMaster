<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=> 'Admin',
            'role_id'=> 1,
            'email'=>'admin@g.com',
            'password'=> bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'name'=> 'Parents',
            'role_id'=> 1,
            'email'=>'parents@g.com',
            'password'=> bcrypt('123456789'),
        ]);
        DB::table('users')->insert([
            'name'=> 'Parvez Parents',
            'role_id'=> 1,
            'email'=>'p@g.com',
            'password'=> bcrypt('123456789'),
        ]);
        DB::table('users')->insert([
            'name'=> 'Furqan Parents',
            'role_id'=> 1,
            'email'=>'f@g.com',
            'password'=> bcrypt('123456789'),
        ]);
    }
}
