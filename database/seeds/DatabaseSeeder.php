<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('employees')->insert([
            'employee_code' => 'EMP00001',
            'lastname' => 'ADMIN',
            'firstname' => 'ADMIN',
            'middlename' => 'ADMIN',
            'date_of_birth' => '06/26/1999',
            'gender' => '1',
            'suffix' => '',
            'address' => 'CABUYAO CITY',
            'civil_status' => '1',
            'religion' => 'ROMAN CATHOLIC',
            'image' => '',
            'status' => '1',
        ]);

        DB::table('users')->insert([
            'contact_number' => '09123456789',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'status' => '1',
            'access' => '1',
            'employee_id' => '1',
        ]);
        
        DB::table('thresholds')->insert([
            'level' => '1',
            'status' => '1',
        ]);
    }
}
