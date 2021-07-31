<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Contestant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Rainwater\Active\Active;

class CompetitionController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'roles' => 'required',

            'contestants' => 'required',


        ]);

     
        
        do 
        {
            $unique_url = str::random(9);
            $check_url = Competition::where('unique_url', $unique_url)->first();
        } while(!empty($check_url));


        $competition = Competition::create([

            'name' => $request->name,

            'roles' => $request->roles,

            'unique_url' => $unique_url,

            'contest_end' => $request->dateTime

        ]);


        $contestants = $request->contestants;
        foreach ($request->contestants as $contestant) {

            Contestant::create([

                'name' => $contestant,

                'unique_url' => $unique_url,

            ]);

        }
        

        if($competition) {

            return response()->json([

                'unique_url' => $unique_url,

                'name' => $request->name,

                'roles' => $request->roles,

                'contestants' => $contestants,

            ]);

        } else {
            return response()->json([

                'status' => false,
                
                'data' => $competition->name,

                'error' => $validator->errors()->all()

            ]);
        }
        
    }


    public function show(Request $request, $unique_url)
    {
        $competition = Competition::where('unique_url', $unique_url)->first();
        $number_of_votes = Contestant::where('unique_url', $unique_url)->sum('number_of_votes');
       
       

        $data = [

            'unique_url' => $unique_url,

            'competition_name' => $competition->name,

            'competition_roles' => $competition->roles,
            
            'contest_end' => $competition->contest_end
         
        ];
        
        return view('show_competition',compact('data'));
    }
}
