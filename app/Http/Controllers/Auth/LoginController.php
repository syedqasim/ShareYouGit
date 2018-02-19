<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


//use Infrastructure\Auth\LoginProxy;
//use Infrastructure\Auth\Requests\LoginRequest;

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
    protected $redirectTo = '/dashboard';


    private $loginProxy;

    // public function __construct(LoginProxy $loginProxy)
    // {
    //     $this->loginProxy = $loginProxy;
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(LoginRequest $request)
    // {
    //     $email = $request->get('email');
    //     $password = $request->get('password');

    //     return $this->response($this->loginProxy->attemptLogin($email, $password));
    // }

    // public function refresh(Request $request)
    // {
    //     return $this->response($this->loginProxy->attemptRefresh());
    // }

    // public function logout()
    // {
    //     $this->loginProxy->logout();

    //     return $this->response(null, 204);
    // }
}
