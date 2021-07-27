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
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey(

            'sk_test_51JHbojDkfUAfHzI5GFW2rbyxSmApiH50i1TYCenxbEGrGraiMJODLpD4GXViU7kLdVtcazWgek45B4brhiD9BKgU0064WWq1ax'
            );
            
            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            
            $charge = \Stripe\Charge::create([
                'amount' => 999*100,
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

            $contestant = Contestant::find($request->id);
            $contestant->number_of_votes += $request->number_votes;
            $contestant->update();


            return redirect()->route('show', $contestant->unique_url);

    }
}
