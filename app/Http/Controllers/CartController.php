<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe\Charge;
use Stripe\Stripe;

class CartController extends Controller
{
    public function index(){
        $user=\Auth::user();
        $stripeCustomer = $user->createOrGetStripeCustomer();
        $intent=$user->createSetupIntent();

        return view('checkout',compact('intent'));
    }
        public function processCheckout(Request $request){
            $user=auth()->user();
            $validator=\Validator::make($request->all(),[
                'first_name'=>'required|alpha',
                'last_name'=>'required|alpha',
                'email'=>'required|email',
                'ph_no'=>'required|regex:/(01)[0-9]{9}/',
            ]);
            if($validator) {
                $payment = $request->input('payment-method');
                Stripe::setApiKey(env('STRIPE_SECRET'));
                $charge=$user->total_charge * 100;
                $name=$request->first_name.''.$request->last_name;
                try {
                    $charge = Charge::create([
                        'amount' => $charge,
                        'currency' => 'USD',
                        'source' => 'tok_mastercard',
                        'description' => $name."'s Checkout",
                        'receipt_email' => $request->email,
                        'metadata' => [],

                    ]);
                    $user->carts()->delete();
                    toast('You have been successfully checkout','success');
                    return back();
                } catch (Exception $e) {
                    Alert::error('Sorry. Something went wrong.Please try again.');
                    return redirect()->back();
                }
            }
        }
}
