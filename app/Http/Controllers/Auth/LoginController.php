<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function login()
    {
        return view('pages.login');
    }

    public function authorizing(Request $request)
    {
        $rules = array(
            'username'    =>  'required',
            'password'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return back()->withErrors($error->errors());
        }

        //$credentials = $request->only('email', 'password');
        //dd(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]));
        $user = User::select('users.*')
        ->join('affectations', 'affectations.idUser', '=', 'users.id')
        ->where('users.name',$request['username'])
        ->where('affectations.statut',1)
        ->first();
        //dd($user);
        if ($user){
            if (password_verify($request['password'], $user->password) && Auth::attempt(['name'=>$user->name,'password'=>$request['password']])) {
                // Authentication passed...
                $this->user = Auth::user();
                return redirect(route('main'));
            }else{
                return redirect(route('/'))->with('error','Nom d\'utilisateur ou mot de passe incorrect');
            }
        }else {
            return redirect(route('/'))->with('error','Nom d\'utilisateur ou mot de passe incorrect');
        }
        
    }

    public function logout(){

        Auth::logout();
        Session::flush();
        return redirect(route('/'));
    }
}
