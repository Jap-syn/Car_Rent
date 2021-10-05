<?php

use Illuminate\Database\Seeder;

class cartypeseeder extends Seeder
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

            
            ['id'=>'1', 'name'=>'Sedan'],
            ['id'=>'2', 'name'=>'SUV'],
            ['id'=>'3', 'name'=>'Saloon'],
            ['id'=>'4', 'name'=>'Luxury'],
            ['id'=>'5', 'name'=>'Hatchback'],
            ['id'=>'6', 'name'=>'Sport'],
            ['id'=>'7', 'name'=>'MPV(Multi Purpose Vehicle)'],
            ['id'=>'8', 'name'=>'Convertible'],
            ['id'=>'9', 'name'=>'Coupe'],
            ['id'=>'10', 'name'=>'Crossover']
            
           

        );

        DB::table('cartype')->insert($objs);
    }
    }

