<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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


     public function login(Request $request)
     {

         $input = $request->all();

         $this->validate($request, [
             'username' => 'required',
             'password' => 'required',
         ],
         [
             'username.required' => 'Ce champ est obligatoire',
             'password.required' => 'Ce champ est obligatoire',
         ]
         );

         $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
         $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

         if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']),$remember_me))
         {
             if(auth::user()->type == 'adv'){
                 return redirect('adv');
             }
             else if(auth::user()->type == 'professionnel') {
                     return redirect('/app-professional');
                 }
            else if(auth::user()->type == 'particulier') {
                    return redirect('/');
                }
            else if(auth::user()->type == 'labo') {
                    return redirect('/labo');
                }
            else if(auth::user()->type == 'commercial') {
                    return redirect('/commercial');
                }
            else if(auth::user()->type == 'admin') {
                    return redirect('/admin/adv');
                }
            else{
                return redirect('/milkcheck');
            }
         }

         else{
            return  redirect()->back()->with('error','Mot de passe ou adresse e-mail incorrects');
           }
     }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
