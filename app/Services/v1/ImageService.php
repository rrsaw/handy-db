<?php

namespace handy\Services\v1;

use Validator;
use handy\Image;
use handy\Item;
use handy\User;

class ImageService
{
    public function getImages($parameters)
    {
        if (empty($parameters)) {
            return $this->filterImages(Image::all());
        }

        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }

    protected $rules = [
    'id' => 'required',
    'name' => 'name',
    'id_item' => 'id_item',
  ];

    public function validate($image)
    {
        $validator = Validator::make($image, $this->rules);
        $validator->validate();
    }

    public function getImage($id)
    {
        return $this->filterImages(Image::where('id', $id)->get());
    }

    public function createImage($req)
    {
        $id = $req->input('id');

        $image = new Image();
    // $image->id = $id;
        $image->id = $req->input('id');
        $image->name = $req->input('name');
        $image->id_item = $req->input('id_item');

        $image->save();

        return $this->filterImages([$image]);
    }

    public function updateImage($req, $id)
    {
        $image = Image::where('id', $id)->firstOrFail();

        $image->id = $req->input('id');
        $image->name = $req->input('name');
        $image->id_item = $req->input('id_item');

        $image->save();

        return $this->filterImages([$image]);
    }

    public function deleteImage($id)
    {
        $image = Image::where('id', $id)->firstOrFail();
        $image->delete();
    }

    protected function filterImages($images)
    {
        $data = [];
        foreach ($images as $image) {
            $entry = [
              'id' => $image->id,
              'name' => $image->name,
              'id_item' => $image->id_item,
          ];

            $data[] = $entry;
        }
        return $data;
    }
}
