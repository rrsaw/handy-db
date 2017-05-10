<?php

namespace handy\Http\Controllers\Auth;

use handy\User;
use handy\ProfileImage;
use handy\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;

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
    protected $redirectTo = '/home';

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
      //Session::set($this->form_session, Input::all());

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phoneNumber' => 'required|min:11|numeric',
            'birthday'   => 'required|date',
            'image' => 'required|image:jpg,png,jpeg|max:5000'
            //'password' => 'required|string|min:6|confirmed',
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
      return ProfileImage::create([
          'name' => $data['image'],
      ]);
      // return Address::create([
      //     'street' => 'Ginestra',
      //     'civic_number' => '42',
      //     'city' => 'Cusano Milanino',
      //     'country' => 'Milano',
      //     'cap' => '20095',
      //     'latitude' => '-14.438939000000000',
      //     'longitude' => '65.097399000000000',
      // ]);
      return User::create([
          'name' => $data['name'],
          'surname' => $data['surname'],
          'email' => $data['email'],
          'phoneNumber' => $data['phoneNumber'],
          'birthday' => $data['birthday'],
          'password' => 'pswd',
          //'password' => bcrypt($data['password']),
      ]);

    }


     // get forms session data
     //$data = Session::get($this->form_session);

     // Return back to form w/ validation errors & session data as input


}
