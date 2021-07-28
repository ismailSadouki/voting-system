<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Models\Verification;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request as FacadesRequest;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $ip = FacadesRequest::ip();
        $vo_uniqueUrl_ted = 'vo'.$request->unique_url.'ted';

        $verification_ip = Verification::where([
            'ip' => $ip,
            'unique_url' => $request->unique_url
        ])->first();
// 
        if( $verification_ip != null || Cookie::get($vo_uniqueUrl_ted) == $vo_uniqueUrl_ted  || $request->voted == $vo_uniqueUrl_ted){
            return response()->json([
                'status' => false,
            ]);  
        } else {

            $vote = Contestant::where(['id' =>  $request->id])->first();

            $vote->number_of_votes += 1;

            $vote->update();

            Cookie::queue(Cookie::make($vo_uniqueUrl_ted, $vo_uniqueUrl_ted));

            Verification::create([
                'ip' => $ip,
                'unique_url' => $request->unique_url,
            ]);
           
            return response()->json([
                'status' => true,
                'number_of_votes' => $vote->number_of_votes,
                'vo_uniqueUrl_ted' => $vo_uniqueUrl_ted,
            ]);

        }
    }
}
