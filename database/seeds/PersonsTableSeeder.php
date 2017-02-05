<?php

use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert([
            [
            	'code' => '2233',
                'name' => 'Angelina',
                'lastname' => 'Jolie',
                'gender' => 'f',
                'email' => 'angelina@jolie.com',
                'address' => 'Av Washington 2233',
                'city' => 'Washington',
                'birth' => '1999-02-02',
                'comments' => 'Besto movies on the world...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            	'code' => '1122',
                'name' => 'Henry',
                'lastname' => 'Ford',
                'gender' => 'm',
                'email' => 'henry@ford.com',
                'address' => 'Av Washington 2233',
                'city' => 'Kansas',
                'birth' => '1979-02-02',
                'comments' => 'Besto cars on the world...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

            ]);


    }
}
