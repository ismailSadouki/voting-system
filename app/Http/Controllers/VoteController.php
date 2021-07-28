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

        $verification = Verification::where([
            'ip' => $ip,
            'unique_url' => $request->unique_url
        ])->first();
// 
        if(isset($verification)){
            $verification_ip = $verification->ip;
        }else {
            $verification_ip = '1';
        }
            // $verification_ip == $ip || Cookie::get($vo_uniqueUrl_ted) == $vo_uniqueUrl_ted  || $request->voted == $vo_uniqueUrl_ted
        if($verification_ip == $ip || Cookie::get($vo_uniqueUrl_ted) == $vo_uniqueUrl_ted  || $request->voted == $vo_uniqueUrl_ted){
            return response()->json([
                'status' => false,
             
            ]);  
        } else {
            Cookie::queue(Cookie::make($vo_uniqueUrl_ted, $vo_uniqueUrl_ted));
            if (!Cookie::has($vo_uniqueUrl_ted)) {
                $vote = Contestant::where(['id' =>  $request->id])->first();

                $vote->number_of_votes = $vote->number_of_votes + 1;
    
                $vote->update();
            }else {
                return response()->json([
                    'status' => false,
                 
                ]);  
            }
            


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
