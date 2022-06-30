<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountriesAndCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate countries and cities tables (make them empty)
        Country::truncate();
        City::truncate();

        //get the json file
        $json = File::get("database/data/countriesandcities.json");

        //create an array from the json file items
        $json = json_decode($json, true);

        foreach ($json as $countryData){
            $country = Country::create(['name'=>$countryData['name']]);
            foreach ($countryData['cities'] as $city){
                $city = City::create(['name'=>$city['name'], 'country_id'=>$country->id]);
            }
        }
    }
}
