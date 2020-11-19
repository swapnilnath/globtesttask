<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\URL;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('front.auth.login');
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->put('login_error', trans('auth.failed'));
        throw ValidationException::withMessages(
            [
                'login_error' => [trans('auth.failed')],
            ]
        );
    }
    public function login(Request $request)
    {
        $validation_array = [
            'email'   => 'required|email',
            'password' => 'required|min:8',
        ];
        $validation = Validator::make($request->all(), $validation_array);
        if ($validation->fails()) {
            return response()->json(['status_code' => '0','success_message' => $validation->messages()->first()], 200);
        }
        $userExist = User::where('role_id', '3')
                        ->where('status', 'active')
                        ->orWhere('email', $request->input('email'))
                        ->first();

        if ($userExist !== null && Auth::attempt([
                'email'     => $request->get('email'),
                'password'  => $request->get('password')
            ])) {
            return redirect()->route('front.post_listing');
        }
        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => 'These credentials do not match our records.'
            ]);
    }
}
