<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            'name' => 'Oscar',
            'surname' => 'Diaz',
            'document' => 123456789,
            'phone' => '24689521',
            'email' => 'prueba@gmail.com'
        ]);
    }
}
