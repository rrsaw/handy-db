<?php

namespace handy\Services\v1;

use Validator;
use handy\Address;
use handy\User;

class AddressService
{
    public function getAddresses($parameters)
    {
        if (empty($parameters)) {
            return $this->filterAddress(Address::all());
        }
        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }

// class AddressService {
//   public function getAddresses($parameters) {
//     if (empty($parameters)) {
//         return $this->filterLoans(Loan::all());
//     }
//
//     if (isset($parameters['include'])) {
//         $includeParms = explode(',', $parameters['include']);
//     }
//
//   }

  protected $rules = [
    'id' => 'required',
    'street' => 'required',
    'civic_number' => 'required',
    'city' => 'required',
    'country' => 'required',
    'latitude' => 'required',
    'longitude' => 'required',
  ];


    public function validate($address)
    {
        $validator = Validator::make($address, $this->rules);
        $validator->validate();
    }

    public function getAddress($id)
    {
        return $this->filterAddress(Address::where('id', $id)->get());
    }

    public function createAddress($req)
    {
        $id = $req->input('id');

        $address = new Loan();
        $address->id = $req->input('id');
        $address->street = $req->input('street');
        $address->civic_number = $req->input('civic_number');
        $address->city = $req->input('city');
        $address->country = $req->input('country');
        $address->latitude = $req->input('latitude');
        $address->longitude = $req->input('longitude');

        $address->save();

        return $this->filterLoans([$address]);
    }

    public function updateAddress($req, $id)
    {
        $loan = Loan::where('id', $id)->firstOrFail();

        $address->id = $req->input('id');
        $address->street = $req->input('street');
        $address->civic_number = $req->input('civic_number');
        $address->city = $req->input('city');
        $address->country = $req->input('country');
        $address->latitude = $req->input('latitude');
        $address->longitude = $req->input('longitude');

        $address->save();

        return $this->filterAddress([$address]);
    }

    public function deleteAddress($id)
    {
        $address = Address::where('id', $id)->firstOrFail();
        $address->delete();
    }

    protected function filterAddress($addresses)
    {
        $data = [];
        foreach ($addresses as $address) {
            $entry = [
              'id' => $address->id,
              'street' => $address->street,
              'civic_number' => $address->civic_number,
              // 'href' => route('loans.show', ['id' => $loan->id])
              'city' => $address->city,
              'country' => $address->country,
              'latitude' => $address->latitude,
              'longitude' => $address->longitude,
          ];

            $data[] = $entry;
        }
        return $data;
    }
}
