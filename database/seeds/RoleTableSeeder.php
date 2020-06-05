<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'admin',
            'slug' => 'admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'parents',
            'slug' => 'parents'
        ]);
    }
}
