<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Log;
use Input;
use Redirect;

class RegistrationController extends Controller
{

  protected function firstStep(Request $request){
    $rules = array(
          'name' => 'required|string|max:255',
          'surname' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'phoneNumber' => 'required|min:11|numeric',
          'birthday'   => 'required|date',
          'image' => 'image:jpg,png,jpeg|max:5000'
       );

       // possibile errore per Input::all() su app
       $validator = Validator::make(Input::all(), $rules);

       if ($validator->fails()) {
           return Redirect::to('/registration')->withErrors($validator);
       } else {
           session([
             'name' => $request->name,
             'surname' => $request->surname,
             'email' => $request->email,
             'phoneNumber' => $request->phoneNumber,
             'birthday' => $request->birthday,
           ]);

           $name = session('name');
           Log::info($name);
           return 'suca';
           // return Redirect::to('/pswdRegistration');
         }
    }
}
