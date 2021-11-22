<?php

namespace Database\Seeders;

use App\Models\Resturant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResturantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('resturants')->insert(
           [
            'name'=>'Number one Pizza',
            'address'=>'Baneshor',
            'city'=>'Kathmandu',
            'state'=>'Bagmati',
            'hours'=>'9:00am-6:00pm',
            'latitude'=>27.7127183009111,
            'longitude'=> 85.32814707931915,
           ]
           );

           DB::table('resturants')->insert(
            [
             'name'=>'Assim Chai ki Tapri',
             'address'=>'Matidevi',
             'city'=>'Kathmandu',
             'state'=>'Bagmati',
             'hours'=>'10:00am-8:00pm',
             'latitude'=>27.452763,
             'longitude'=> 80.41228,
            ]
            );
    }
}
