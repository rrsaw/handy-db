<?php

namespace handy\Services\v1;

use Validator;

// use handy\User;
use handy\User;

class UserService
{
    public function getUsers($parameters)
    {
        if (empty($parameters)) {
            return $this->filterUsers(User::all());
        }

        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }


    protected $rules = [
    'id' => 'required',
    'name' => 'required',
    'surname' => 'required',
    'birth_date' => 'required|date',
    'email' => 'required',
    'phone_number' => 'required',
    'password' => 'required',
    'remember_token' => 'required',
    'id_address' => 'required',
    'id_profile_image' => 'required',
    'api_token' => 'required',
  ];

    public function validate($user)
    {
        $validator = Validator::make($user, $this->rules);
        $validator->validate();
    }

    public function getUser($id)
    {
        return $this->filterUsers(User::where('id', $id)->get());
    }

    public function createUser($req)
    {
        $id = $req->input('id');

        $user = new User();
    // $loan->id = $id;
        $user->id = $req->input('id');
        $user->name = $req->input('name');
        $user->surname = $req->input('surname');
        $user->birth_date = $req->input('birth_date');
        $user->email = $req->input('email');
        $user->phone_number = $req->input('phone_number');
        $user->password = $req->input('password');
        $user->remember_token = $req->input('remember_token');
        $user->id_address = $req->input('id_address');
        $user->id_profile_image = $req->input('id_profile_image');
        $user->api_token = $req->input('api_token');

        $user->save();

        return $this->filterUsers([$user]);
    }

    public function updateUser($req, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->id = $req->input('id');
        $user->name = $req->input('name');
        $user->surname = $req->input('surname');
        $user->birth_date = $req->input('birth_date');
        $user->email = $req->input('email');
        $user->phone_number = $req->input('phone_number');
        $user->password = $req->input('password');
        $user->remember_token = $req->input('remember_token');
        $user->id_address = $req->input('id_address');
        $user->id_profile_image = $req->input('id_profile_image');
        $user->api_token = $req->input('api_token');

        $user->save();

        return $this->filterUsers([$user]);
    }

    public function deletUsers($id)
    {
        $users = User::where('id', $id)->firstOrFail();
        $users->delete();
    }

    protected function filterUsers($users)
    {
        $data = [];
        foreach ($users as $user) {
            $entry = [
              'id' => $user->id,
              'name' => $user->name,
              'surname' => $user->surname,
              // 'href' => route('loans.show', ['id' => $loan->id])
              'birth_date' => $user->birth_date,
              'email' => $user->email,
              'phone_number' => $user->phone_number,
              'password' => $user->password,
              'remember_token' => $user->remember_token,              'remember_token' => $user->remember_token,
              'id_address' => $user->id_address,
              'id_profile_image' => $user->id_profile_image,
              'api_token' => $user->api_token,

          ];

            $data[] = $entry;
        }
        return $data;
    }
}
