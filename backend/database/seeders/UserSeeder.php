<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        User::insert([
            [
                'name' => 'start_datetime',
                'email' => 'info@epictransformationchallenge.com',
                'password' => Hash::make(']Eb5UOeRLY6bg'),
                'email_verified_at' => Carbon::now(),
                'is_admin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'end_datetime',
                'email' => 'zorenleolumosbog@gmail.com',
                'password' => Hash::make(']Eb5UOeRLY6bg'),
                'email_verified_at' => Carbon::now(),
                'is_admin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
