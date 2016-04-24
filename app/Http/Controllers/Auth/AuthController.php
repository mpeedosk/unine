<?php

namespace App\Http\Controllers\Auth;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $username = 'username';

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }


    /**
     * check if username is taken or not
     *
     */

    public function checkAvailableUser(Request $request)
    {
        $count = DB::table('users')->select('username')->where('username', '=', $request->username)->count();
        if($count>0){
            return response()->json(['response' => 'false']);
        }else{
            return response()->json(['response' => 'true']);
        }

    }
    public function checkAvailableEmail(Request $request)
    {
        Log::info($request);

        $count = DB::table('users')->select('email')->where('email', '=', $request->email)->count();
        if($count>0){
            return response()->json(['response' => 'false']);
        }else{
            return response()->json(['response' => 'true']);
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return Redirect::to('home');
    }

    private function findOrCreateUser($facebookUser)
    {
        if ($authUser = User::where('fb_id', $facebookUser->id)->first()) {
            return $authUser;
        }
        $arr = explode(" ", $facebookUser->name);
        $first = $arr[0];
        $last = end($arr);
        return User::create([
            'username' => $facebookUser->id,
            'first_name' => $first,
            'last_name' => $last,
            'email' => $facebookUser->email,
            'fb_id' => $facebookUser->id,
        ]);
    }
}
