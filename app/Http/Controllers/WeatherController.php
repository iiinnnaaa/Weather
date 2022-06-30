<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(){
        $data['countries'] = Country::get(["name", "id"]);
        return view('forms', $data);
    }


    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
