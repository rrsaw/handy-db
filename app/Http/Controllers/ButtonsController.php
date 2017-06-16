<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use Validator;
use Auth;
use handy\Item;
use handy\Image;
use handy\Category;

class ButtonsController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login');
    }

    public function storeItem(Request $request)
    {
        $rules = array(
         'name' => 'required|string',
         'description' => 'string',
         'startDate' => 'required|date|after:yesterday|before:endDate',
         'endDate' => 'required|date|after:startDate',
         'price' => 'required|numeric',
         'category' => 'required',
         'image' => 'image:jpg,png,jpeg|max:50000'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            dd($validator);
            return Redirect::back()->withErrors($validator);
        } else {
            $id_category = Category::find($request->category);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/items'), $imageName);

            $item = new Item;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->start_date = $request->startDate;
            $item->end_date = $request->endDate;
            $item->price = $request->price;
            $item->status = 0;
            $item->id_category = $id_category->id;
            $item->id_user = Auth::user()->id;
            $item->save();

            $image = new Image;
            $image->name = $imageName;
            $image->id_item = $item->id;
            $image->save();

            Session::flash('message', 'Successfully creating!');
            return Redirect::to('/items');
        }
    }
}
