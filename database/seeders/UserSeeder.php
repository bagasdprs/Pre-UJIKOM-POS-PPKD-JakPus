<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Heri Lesmana',
        //     'email' => 'herilesmanapribadi@gmail.com',
        //     'username' => 'heri',
        //     'password' => bcrypt('asdf')
        // ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'adminposppkd@gmail.com',
            'username' => 'adminposppkd',
            'password' => Hash::make('posppkdjp123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Cashier',
            'email' => 'kasirposppkdjp@gmail.com',
            'username' => 'kasirposppkd',
            'password' => Hash::make('kasirpos123'),
            'role' => 'cashier'
        ]);

        User::create([
            'name' => 'Leaders of POS PPKD JakPus',
            'email' => 'ceo.posppkdjp@gmail.com',
            'username' => 'ceoposppkdjp',
            'password' => Hash::make('ceopos123'),
            'role' => 'leaders'
        ]);
    }
}
