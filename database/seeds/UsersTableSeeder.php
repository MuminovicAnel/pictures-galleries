<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Gilles Éjone',
                'email' => 'superadmin@cpnv.ch',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'root',
                'email' => 'root@cpnv.ch',
                'password' => bcrypt('secret'),
            ]
        );
    }
}
