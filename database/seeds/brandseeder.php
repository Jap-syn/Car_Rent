<?php

use Illuminate\Database\Seeder;
class brandseeder extends Seeder
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

            
            ['id'=>'1', 'name'=>'Toyota'],
            ['id'=>'2', 'name'=>'Hyundai'],
            ['id'=>'3', 'name'=>'BMW'],
            ['id'=>'4', 'name'=>'Honda'],
            ['id'=>'5', 'name'=>'Mitsubishi'],
            ['id'=>'6', 'name'=>'SouEast'],
            ['id'=>'7', 'name'=>'Mazada'],
            ['id'=>'8', 'name'=>'Ford'],
            ['id'=>'9', 'name'=>'Luxus'],
            ['id'=>'10', 'name'=>'Porsche'],
            ['id'=>'11', 'name'=>'Nissan'],
            ['id'=>'12', 'name'=>'Suzuki'],
            ['id'=>'13', 'name'=>'Jaguar'],
            ['id'=>'14', 'name'=>'Peugeot'],
            ['id'=>'15', 'name'=>'Mercedes'],
            ['id'=>'16', 'name'=>'GAC'],
            ['id'=>'17', 'name'=>'BAIC'],
            ['id'=>'18', 'name'=>'Cadillac'],
            ['id'=>'19', 'name'=>'Mini Copper'],
            ['id'=>'20', 'name'=>'Ferrari'],
            ['id'=>'21', 'name'=>'Bugatti'],
            ['id'=>'22', 'name'=>'Lamborghini'],
            ['id'=>'23', 'name'=>'Jeep'],
            ['id'=>'24', 'name'=>'KIA'],
            ['id'=>'25', 'name'=>'Audi'],
            ['id'=>'26', 'name'=>'Bentley'],
            ['id'=>'27', 'name'=>'GMC'],
            ['id'=>'28', 'name'=>'Chevrolet'],
            ['id'=>'29', 'name'=>'Rolls Royce'],
            ['id'=>'30', 'name'=>'Volkswagen'],
            ['id'=>'31', 'name'=>'Tesla'],
            ['id'=>'32', 'name'=>'Volvo'],
            ['id'=>'33', 'name'=>'Tata'],
            ['id'=>'34', 'name'=>'Land Rover'],
            ['id'=>'35', 'name'=>'Daewoo'],
            ['id'=>'36', 'name'=>'Infiniti']


            

        );

        DB::table('brand')->insert($objs);
    }
    
}
