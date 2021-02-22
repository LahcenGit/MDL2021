<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\professionnel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'entreprise' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'NIF' => ['required', 'string', 'max:255'],
            'RC' => ['required', 'string', 'max:255'],
            'wilaya' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'codePostal' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'fax' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
      

        $user = new User;
        $user->nom = $data['nom'];
        $user->prenom = $data['prenom'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        
        $user->save();

        if(RC!=null){

        $professionnel = new professionnel();
      
        $professionnel->entreprise = $data['entreprise'];
        $professionnel->adresse = $data['adresse'];
        $professionnel->phone = $data['phone'];
        $professionnel->fax = $data['fax'];
        $professionnel->wilaya = $data['wilaya'];
        $professionnel->commune = $data['commune'];
        $professionnel->RC = $data['RC'];
        $professionnel->NIF = $data['NIF'];
        $user->professionnel()->save($professionnel);

}
       else{
        $particulier = new particulier();
        $particulier->adresse = $data['adresse'];
        $particulier->wilaya = $data['wilaya'];
        $particulierl->commune = $data['commune'];
        $particulier->codePostal = $data['codePostal'];
        $particulier->phone = $data['phone'];
        $user->particulier()->save($particulier);
    }

        return $user;

    }
}
