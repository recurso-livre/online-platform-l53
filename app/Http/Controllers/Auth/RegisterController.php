<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|max:17',
            'password' => 'required|min:6|max:51|confirmed',
            'zipCode' => 'required|max:255',
            'street' => 'required|max:255',
            'additionalData' => 'max:255',
            'neighborhood' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // Criar Endereço
        $address = Address::create([
            'zipCode' => $data['zipCode'],
            'street' => $data['street'],
            'additionalData' => $data['additionalData'],
            'neighborhood' => $data['neighborhood'],
            'city' => $data['city'],
            'state' => $data['state']
        ]);

        // Criação de Usuário
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);

        // Anexar endereço ao usuário criado
        $user->addresses()->attach($address->id);

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('pages.user.create');
    }
}
