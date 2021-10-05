<?php

use Illuminate\Database\Seeder;

class roleseeder extends Seeder
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

            
            ['id'=>'1', 'name'=>'admin'],
            ['id'=>'2', 'name'=>'owner'],
            ['id'=>'3', 'name'=>'user']
           

        );

        DB::table('role')->insert($objs);
    }
    }

