<?php

use Illuminate\Database\Seeder;

class usersseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $objs = array(

            // default password is 'aaaaaaaa'
            ['id'=>'1', 'name'=>'stns', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'admin@gmail.com', 'role_id' =>'1','phone'=>'09250676233','address'=>'ygn'],
            ['id'=>'2', 'name'=>'sithu', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'owner@gmail.com', 'role_id' =>'2','phone'=>'09254490447','address'=>'ygn']
          

        );

        DB::table('users')->insert($objs);
    }
    }

