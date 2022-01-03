<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        User::create([
            'name'              => 'default',
            'email'             => 'default@gmail.com',
            'password'          => bcrypt('12345678'),
            'email_verified_at' => now(),
            ])->assignRole('admin');

        
    }
}
