<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'student/staff',
                'email'=>'hajar@gmail.com',
                'role'=>'student/staff',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'technician',
                'email'=>'technician@gmail.com',
                'role'=>'technician',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
