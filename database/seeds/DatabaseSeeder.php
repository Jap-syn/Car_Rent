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
        $this->call(usersseeder::class);
        $this->call(roleseeder::class);
        $this->call(brandseeder::class);
        $this->call(cartypeseeder::class);
        

      
    }
}
