<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Member;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:member')->except('logout');
        $this->middleware('guest:client')->except('logout');
    }

    public function memberLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('member')->attempt(['email' => request('email'), 'password' => request('password')],$request->get('remember'))){
            
            $member = Member::select('members.*')->find(auth()->guard('member')->user()->id);
            $success =  $member;

            return redirect()->intended('qrcode/manage');

        }else{
            return redirect()->route('partners.qrcode-login')->with('message','Email-Address Or Password Are Wrong.');
        }
    }

    
}
