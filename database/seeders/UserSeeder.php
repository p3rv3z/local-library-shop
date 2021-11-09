<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $superAdmin = User::create([
        'name' => 'Master',
//        'date_of_birth' => '21/04/2021',
        'email' => 'master@locallibraryshop.test',
        'email_verified_at' => now(),
        'password' => '$2y$10$3Bhnoyae/qczE.4AVPkUCe1wHsbrQTt3Hepq521R2Mfclan3hA13a',
      ]);

      $superAdmin->assignRole('Super Admin');

      $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@locallibraryshop.test',
        'email_verified_at' => now(),
        'password' => '$2y$10$3Bhnoyae/qczE.4AVPkUCe1wHsbrQTt3Hepq521R2Mfclan3hA13a',
      ]);

      $admin->assignRole('Admin');

      $member = User::create([
        'name' => 'Member',
        'email' => 'member@locallibraryshop.test',
        'email_verified_at' => now(),
        'password' => '$2y$10$3Bhnoyae/qczE.4AVPkUCe1wHsbrQTt3Hepq521R2Mfclan3hA13a',
      ]);

      $member->assignRole('Member');
    }
}
