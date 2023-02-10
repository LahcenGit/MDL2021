<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Particularcart;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Professionnel;
use App\Models\Particulier;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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

   //protected $redirectTo = RouteServiceProvider::HOME;
   protected function redirectTo()
   {
       if (auth::user()->type == 'professionnel') {
           return 'app-professional';
       }
       else if(auth::user()->type == 'particulier'){
          return '/';
       }

   }

   /**
    * Create a new controller instance.
    *
    * @return void
    */

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
                'name' => ['required', 'string', 'max:255'],
                'entreprise' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'NIF' => ['required', 'string', 'max:255'],
                'RC' => ['required', 'string', 'max:255'],
                'wilaya' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'fax' => ['nullable','string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'password.min' => 'minimum 8 caractères',
                'password.confirmed' => 'la confirmation du mot de passe ne correspond pas',
                'password.regex' =>'confirmer le mot de passe  ',
                'email.unique' => 'ce email existe déja',
                'email.email' => 'e-mail doit être une adresse e-mail valide.',
                'phone.unique' => 'ce numéro existe déja',
                'NIF.required' =>'NIF est obligatoire',
                'RC.required' =>'RC est obligatoire',
                'wilaya.required' =>'wilaya est obligatoire',
                'entreprise.required' =>'entreprise est obligatoire',
                'adresse.required' =>'adresse est obligatoire',
                'password.required'=>'le mot de passe est obligatoire',
                'name.required' => 'nom est obligatoire',
                'email.required' => 'e-mail est obligatoire',
                'phone.required' => 'telephone est obligatoire',
            ]
        );

        }

        else {
           return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'wilaya' => ['required', 'string', 'max:255'],
            ],
            [
                'password.min' => 'minimum 8 caractères',
                'password.confirmed' => 'la confirmation du mot de passe ne correspond pas',
                'password.regex' =>'confirmer le mot de passe  ',
                'email.unique' => 'ce email existe déja',
                'email.email' => 'adresse e-mail invalide',
                'phone.unique' => 'ce numéro existe déja',
                'password.required'=>'le mot de passe est obligatoire',
                'name.required' => 'nom est obligatoire',
                'email.required' => 'e-mail est obligatoire',
                'phone.required' => 'telephone est obligatoire',
                'wilaya.required' =>'wilaya est obligatoire',
            ]
        );
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
        $user->name = $data['name'];
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
        $user->professional()->save($professional);

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
            $particular = new Particulier();
            $particular->phone = $data['phone'];
            $particular->wilaya = $data['wilaya'];
            $user->particular()->save($particular);
            $cart = new Particularcart();
            $cart->particular_id = $particular->id;
            $cart->save();
        }

         return $user;

}
}
