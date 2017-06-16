<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Log;
use Input;
use Redirect;
use GoogleMapsFacade;
use Auth;
use handy\User;
use handy\ProfileImage;
use handy\Address;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function firstStep(Request $request)
    {
        $rules = array(
          'name' => 'required|string|max:255',
          'surname' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'phoneNumber' => 'required|min:8|numeric',
          'birthday'   => 'required|date',
          'image' => 'image:jpg,png,jpeg|max:5000'
       );

       // possibile errore per Input::all() su app
       $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/registration')->withInput()->withErrors($validator);
        } else {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/personal-images'), $imageName);

            session([
             'name' => $request->name,
             'surname' => $request->surname,
             'email' => $request->email,
             'phoneNumber' => $request->phoneNumber,
             'birth_date' => $request->birthday,
             'image' => $imageName,
           ]);

            return Redirect::to('/confirm');
        }
    }

    protected function secondStep(Request $request)
    {
        $address = $request->street." ".$request->civic." ".$request->city;

        $rules = array(
            'street' => 'required|string|max:255',
            'civic' => 'required|numeric|max:999|min:0',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'password' => 'required|string|min:6',
         );

        $response = \GoogleMaps::load('geocoding')->setParam([
                  'address'    => $address,
                 'components' => [
                         'country'=> $request->country,
                      ]
                ])
                ->get();

        $validator = Validator::make(Input::all(), $rules);
        $address = json_decode($response, true);

        if ($validator->fails()) {
            return Redirect::to('/confirm')->withInput()->withErrors($validator);
        } elseif (count($address["results"]) == 0) {
            return Redirect::to('/confirm')->withInput()->with("status", "indirizzo sbagliato");
        } else {
            $latitude = $address["results"][0]["geometry"]["location"]["lat"];
            $longitude = $address["results"][0]["geometry"]["location"]["lng"];
            $country = $address["results"][0]["address_components"][6]["long_name"];

            $address = new Address;
            $address->street =  $request->street;
            $address->civic_number =  $request->civic;
            $address->city =  $request->city;
            $address->country =  $country;
            $address->latitude =  $country;
            $address->longitude =  $country;
            $address->save();

            $profileImage = new ProfileImage;
            $profileImage->name = session('image');
            $profileImage->save();

            $user = new User;
            $user->name = session('name');
            $user->surname = session('surname');
            $user->email = session('email');
            $user->phone_number = session('phoneNumber');
            $user->birth_date = session('birth_date');
            $user->password = bcrypt($request->password);
            $user->id_address = $address->id;
            $user->id_profile_image = $profileImage->id;
            $user->save();

            Auth::loginUsingId($user->id);
            return Redirect::to('/explore');
        }
    }
}
