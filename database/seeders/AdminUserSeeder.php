<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=>'Admin CIBLON',
            'email'=>'admin@ciblon.test',
            'password'=>bcrypt('password123'), // ubah nanti
        ]);
    }
}
