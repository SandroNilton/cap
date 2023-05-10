<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Area;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
          'type' => 10,
          'code' => $this->generateUniqueCode(),
          'code_type'=> null,
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('admin'),
          'address' => null,
          'phone' => null,
          'area_id' => null,
          'is_admin' => 1,
          'state' => 1,
        ])->assignRole('admin');
    }

    public function generateUniqueCode()
    {
        do { $code = random_int(100000, 999999); } while ( User::where("code", "=", $code)->first() );
        return $code;
    }
}
