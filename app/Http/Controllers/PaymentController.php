<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Contestant;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentPage($id) 
    {
        $contestant = Contestant::find($id);
        $competition = Competition::where('unique_url',$contestant->unique_url)->select('name')->first();
        return view('payment', compact('competition', 'contestant'));
    }

    public function payment(Request $request)
    {
        
        switch($request->radio){
            case(1):
                $price = 2;
                $number_votes = 10;
                break;
            case(2):
                $price = 10;
                $number_votes = 50;
                break;
            case(3):
                $price = 20;
                $number_votes = 100;
                break;
        }
       
            
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey(
            env('STRIPE_API_KEY')
            );
            
            
            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            
            $charge = \Stripe\Charge::create([
                'amount' => $price*100,
                'currency' => env('STRIPE_CURRENCY'),
                'description' => 'Example charge',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

            $contestant = Contestant::find($request->id);
            $contestant->number_of_votes += $number_votes;
            $contestant->update();


            return redirect()->route('show', $contestant->unique_url);

    }
}
