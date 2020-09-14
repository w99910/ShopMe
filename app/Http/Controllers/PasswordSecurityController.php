<?php

namespace App\Http\Controllers;

use App\PasswordSecurity;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Generator\StringManipulation\Pass\Pass;
use PragmaRX\Google2FA\Google2FA;
use Auth;

class PasswordSecurityController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $user = Auth::user();
        $google2fa_url = "";
        $secret_key = "";

        if($user->password_security()->exists()){
            $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
            $google2fa_url = $google2fa->getQRCodeInline(
                'E-Commerce',
                $user->email,
                $user->password_security->google2fa_secret
            );
            $secret_key = $user->password_security->google2fa_secret;
        }

        $data = array(
            'user' => $user,
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url
        );

        return view('auth.2fa')->with('data', $data);

    }
    public function enable2fa(Request $request){
        $user = Auth::user();
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $secret = $request->input('secret');
        $valid = $google2fa->verifyKey($user->password_security->google2fa_secret, $secret);

        if($valid){
            $user->password_security->google2fa_enable = 1;
            $user->password_security->save();
            return redirect('2fa')->with('success',"2FA is enabled successfully.");
        }else{
            return redirect('2fa')->with('error',"Invalid verification Code, Please try again.");
        }
    }
    public function disable2fa(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your password does not matches with your account password. Please try again.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
        ]);
        $user = Auth::user();
          $password_security = $user->password_security;
          $password_security->delete();
        return redirect('/2fa')->with('success',"2FA is now disabled.");
    }

    public function generate2fa(){
        $user = Auth::user();
        // Initialise the 2FA class
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        // Add the secret key to the registration data
        $login_security = PasswordSecurity::firstOrNew(['user_id'=> $user->id]);
        $login_security->user_id = $user->id;
        $login_security->google2fa_enable = 0;
        $login_security->google2fa_secret = $google2fa->generateSecretKey();
        $login_security->save();

        return redirect('/2fa')->with('success',"Secret key is generated.");
    }

}
