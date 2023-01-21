<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Professionnel;
use App\Models\Particulier;
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
    protected $redirectTo = '/order-pro';

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
        if($data['check'] == "milkcheck"){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        }
        if($data['check'] == "pro"){

            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'entreprise' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'NIF' => ['required', 'string', 'max:255'],
                'RC' => ['required', 'string', 'max:255'],
                'wilaya' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'fax' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'password.min' => 'Le mot de passe est obligatoire',
                'password.regex' =>'Confirmer le mot de passe  ',
                'email.unique' => 'Ce email existe déja',
                'email.email' => 'e-mail doit être une adresse e-mail valide.',
                'phone.unique' => 'Ce numéro existe déja',
                'fax.required' =>'Fax est obligatoire',
                'NIF.required' =>'NIF est obligatoire',
                'RC.required' =>'RC est obligatoire',
                'wilaya.required' =>'Wilaya est obligatoire',
                'entreprise.required' =>'Entreprise est obligatoire',
                'adresse.required' =>'Adresse est obligatoire',
                'password.required'=>'le mot de passe est obligatoire',
                'first_name.required' => 'Nom est obligatoire',
                'last_name.required' => 'Prenom champ est obligatoire',
                'email.required' => 'E-mail est obligatoire',
                'phone.required' => 'Telephone est obligatoire',
            ]
        );

        }

        else {

            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'wilaya' => ['required', 'string', 'max:255'],
                'commune' => ['required', 'string', 'max:255'],
                'code_postal' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);


        }


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['check'] == "milkcheck"){
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
        }


        if($data['check'] == "pro"){

        $user = new User;

        $user->type = 'professionnel';
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $professional = new Professionnel();

        $professional->entreprise = $data['entreprise'];
        $professional->adresse = $data['adresse'];
        $professional->phone = $data['phone'];
        $professional->fax = $data['fax'];
        $professional->wilaya = $data['wilaya'];
        $professional->RC = $data['RC'];
        $professional->NIF = $data['NIF'];
        $professional->type = $data['type'];
        $user->professionnel()->save($professional);

        $cart = new Cart();
        $cart->professional_id = $professional->id;
        $cart->save();
        }

        else{

        $user = new User;

        $user->type = 'particulier';
        $user->name = $data['name'];

        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();


        $particulier = new Particulier();
        $particulier->adresse = $data['adresse'];
        $particulier->wilaya = $data['wilaya'];
        $particulier->commune = $data['commune'];
        $particulier->code_postal = $data['code_postal'];
        $particulier->phone = $data['phone'];

        $user->particulier()->save($particulier);

        }

       return $user;

}
}
