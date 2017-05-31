<?php

namespace handy\Services\v1;

use Validator;
use handy\ProfileImage;
use handy\User;

class ProfileImageService
{
    public function getProfileImages()
    {
        if (empty($parameters)) {
            return $this->filterProfileImages(ProfileImage::all());
        }

        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }



    protected $rules = [
    'id' => 'required',
    'name' => 'required',
  ];

    public function validate($profileImage)
    {
        $validator = Validator::make($profileImage, $this->rules);
        $validator->validate();
    }

    public function getProfileImage($id)
    {
        return $this->filterProfileImages(ProfileImage::where('id', $id)->get());
    }

    public function createProfileImage($req)
    {
        $id = $req->input('id');

        $profileImage = new ProfileImage();
        $profileImage->id = $req->input('id');
        $profileImage->name = $req->input('name');

        $profileImage->save();

        return $this->filterProfileImages([$profileImage]);
    }

    public function updateProfileImage($req, $id)
    {
        $profileImage = ProfileImage::where('id', $id)->firstOrFail();

        $profileImage->id = $req->input('id');
        $profileImage->name = $req->input('name');

        $profileImage->save();

        return $this->filterProfileImages([$profileImage]);
    }

    public function deleteProfileImage($id)
    {
        $profileImage = ProfileImage::where('id', $id)->firstOrFail();
        $profileImage->delete();
    }

    protected function filterProfileImages($profileImages)
    {
        $data = [];
        foreach ($profileImages as $profileImage) {
            $entry = [
              'id' => $profileImage->id,
              'name' => $profileImage->name,
          ];

            $data[] = $entry;
        }
        return $data;
    }
}
