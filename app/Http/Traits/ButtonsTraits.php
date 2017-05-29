<?php

namespace handy\Http\Traits;

use Validator;
use Input;
use Auth;
use Redirect;
use handy\Item;
use handy\Image;

trait ButtonsTrait
{
    public function storeItem(Request $request)
    {
        $rules = array(
     'name' => 'required',
     'description' => 'text',
     'startDate' => 'required|date|after:today|before:endDate',
     'endDate' => 'required|date|after:startDate',
     'price' => 'required|numeric',
     'category' => 'required',
     'image' => 'image:jpg,png,jpeg|max:5000'
    );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/items'), $imageName);

            $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'price' => $request->price,
            'status' => 0,
            'id_category' => $request->category,
            'id_user' => Auth::user()->id,
          ]);

            Image::create([
            'name' => $imageName,
            'id_items' => $item->id,
          ]);

            Session::flash('message', 'Successfully creating!');
            return Redirect::to('/items');
        }
    }
}
