<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Merchant;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        Merchant::truncate();

        $user = User::create([
            'name' => 'Developer',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('developer'),
            'role_id' => 1,
            'is_merchant' => true
        ]);
        

        $user->merchant()->create([
            'is_validated' => true
        ]);
    }
}
