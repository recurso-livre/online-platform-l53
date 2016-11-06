<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Log;
use App\User;
use App\Address;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|min:6|max:20|regex:/^(\+[0-9]{1,2}[\s-]?)?\(?[0-9]{1,4}\)?[\s-]?([0-9][\s-]?)?[0-9]{3,4}\s?-?\s?[0-9]{4}$/i',
            'password' => 'required|min:6|max:51|confirmed',
            'zipCode' => 'required|min:5|max:40|regex:/^[0-9]{3,8}-[0-9]{3}$/i',
            'street' => 'required|max:255',
            'additionalData' => 'max:255',
            'neighborhood' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->route('guest.create')
                ->withErrors($validator, 'guest')
                ->withInput();
        }

        $this->guard()->login($this->create($request->all()));

        return redirect($this->redirectPath());
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
        
        // Criar arquivo do usuário no S3. Nome da pasta = id do usuário no BD
        // DEBUG
        Storage::put("$user->id"."/meta", $user->toJson(), 'public');

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
