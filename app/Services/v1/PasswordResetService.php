<?php

namespace handy\Services\v1;

use Validator;
use handy\User;

class PasswordService
{
    public function getPasswordResets($parameters)
    {
        if (empty($parameters)) {
            return $this->filterPasswordReset(PasswordReset::all());
        }
        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }

    protected $rules = [
    'email' => 'required',
    'token' => 'required',
  ];


    public function validate($passwordReset)
    {
        $validator = Validator::make($passwordReset, $this->rules);
        $validator->validate();
    }

    public function getPasswordReset($id)
    {
        return $this->filterPasswordReset(PasswordReset::where('email', $id)->get());
    }

    public function createPasswordReset($req)
    {
        $id = $req->input('email');

        $passwordReset = new PasswordReset();
        $passwordReset->email = $req->input('email');
        $passwordReset->token = $req->input('token');
        $passwordReset->save();

        return $this->filterPasswordResets([$passwordReset]);
    }

    public function updatePasswordReset($req, $id)
    {
        $passwordReset = PasswordReset::where('email', $id)->firstOrFail();

        $passwordReset->id = $req->input('id');
        $passwordReset->street = $req->input('street');

        $passwordReset->save();

        return $this->filterAddress([$passwordReset]);
    }

    public function deletePasswordReset($id)
    {
        $passwordReset = PasswordReset::where('email', $id)->firstOrFail();
        $passwordReset->delete();
    }

    protected function filterPasswordReset($passwordResets)
    {
        $data = [];
        foreach ($passwordResets as $passwordReset) {
            $entry = [
              'email' => $passwordReset->email,
              'token' => $passwordReset->token,

          ];

            $data[] = $entry;
        }
        return $data;
    }
}
