<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */

    public function CreateUser($email,$name)
    {
        $newSocialUser = new User;
        $newSocialUser->email= $email; //'zz1@zz.com';
        if(empty($name))
         {
             $newSocialUser->name =$email;
         }
         else
               $newSocialUser->name = $name;
       // $newSocialUser->name = $name;
        $newSocialUser->password = bcrypt(str_random(16));
        $newSocialUser->created_at=date("Y-m-d H:i:s");
        $newSocialUser->updated_at=date("Y-m-d H:i:s");
        $newSocialUser->save();
        return $newSocialUser;
    }
    public function GetUser($email,$name)
    {
        $socialUser= null;
        
        //Check is this email present
        $userCheck = User::where('email', '=', $email)->first();
         if (!empty($userCheck)) {
            $socialUser = $userCheck;
         }
         else{
                //if user is not in user table
                $socialUser= $this->CreateUser($email,$name);
         }
        return $socialUser;
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        // $socialUser=$this->GetUser($user->getEmail(),$user->getName());
        //  if(!auth()->user())
        //     auth()->login($socialUser, true);

            return response()->json($user);
        // return redirect('/dashboard');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
        // $socialUser=$this->GetUser($user->getEmail(),$user->getName());
        //  if(!auth()->user())
        //     auth()->login($socialUser, true);
        //  return redirect('/dashboard');
        return response()->json($user);
    }
}
