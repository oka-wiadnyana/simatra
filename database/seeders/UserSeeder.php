<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'name'=>'Super Admin',
                'username'=>'super_admin',
                'password'=>Hash::make('super_admin'),
                'role'=>'super_admin',
                'satker_id'=>'1',

            ]
        ];

        foreach($users as $user){
            User::create([
                'name'=>$user['name'],
                'username'=>$user['username'],
                'password'=>$user['password'],
                'role'=>$user['role'],
                'satker_id'=>$user['satker_id'],
            ]);
        }
    }
}
