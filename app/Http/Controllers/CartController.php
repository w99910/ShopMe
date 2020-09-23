<?php

namespace App\Http\Controllers;

use App\Mail\InvoicePaid;
use App\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
                    $Charge = Charge::create([
                        'amount' => $charge,
                        'currency' => 'USD',
                        'source' => 'tok_mastercard',
                        'description' => $name."'s Checkout",
                        'receipt_email' => $request->email,
                        'metadata' => [],

                    ]);
                    Revenue::create(['user_id'=>$user->id,'invoice'=>$charge]);
                    Mail::to($request->email)->send(new InvoicePaid($user->carts,$charge));
                    $user->carts()->delete();
                    toast('You have been successfully checkout.Please check your email.','success');
                    return back();
                } catch (Exception $e) {
                    Alert::error('Sorry. Something went wrong.Please try again.');
                    return redirect()->back();
                }
            }
        }
}
