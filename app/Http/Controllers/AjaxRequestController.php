<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public function ajaxRelevantCity(Request $request)
    {
        $country_id = $request->input('country_id');
        $cities = City::where('country_id', $country_id)->get();

            if(count($cities)>0) {

                $output = '<option value="" disabled>Select City</option>';
                foreach($cities as $city)
                {
                    $output .= '<option value="'.$city->id.'">'.$city->name.'</option>';
                }
                echo $output;

            }

            else {
                $output = '<option value="">No City Found</option>';
                echo $output;

            }


    }
}
