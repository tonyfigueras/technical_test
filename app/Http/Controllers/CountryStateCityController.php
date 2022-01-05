<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class CountryStateCityController extends Controller
{
    /**
     * Retrieve countries data
     *
     * @return void
     */
    public function country()
    {
        $data = Country::get();
        return response()->json($data);
    }
   
    public function state($country_id)
    {
        $data = State::where('country_id', $country_id)->get();
        return response()->json($data);
    }

    public function city($state_id)
    {
        $data = City::where('state_id', $state_id)->get();
        return response()->json($data);
    }
}

 