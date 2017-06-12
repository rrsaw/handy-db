<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use handy\Item;
use handy\Image;
use handy\Category;
use handy\Review;
use Auth;
use Session;
use Validator;
use Input;
use Redirect;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $items = Item::where('id_user', $id)->get();
        // dd($items);

        return view('items.published', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $reviews = Review::where('id_item', $item->id)->orderBy('id', 'desc')->get();

        return view('detail', compact('item', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
       'name' => 'required|string',
       'description' => 'string',
       'startDate' => 'required|date|before:endDate',
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
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/items'), $imageName);
                $image = Image::where("id_item", $id)->first();
                $image_path = public_path("images/items/{$image->name}");
                $image->name = $imageName;
                $image->save();
                File::delete($image_path);
              // $id_image = Image::find();
              // $image = Image::where("id_item", $id)->get();
              // dd($image[0]->name);
            }

            $id_category = Category::find($request->category);


            $item = Item::find($id);
            $item->name = $request->name;
            $item->description = $request->description;
            $item->start_date = $request->startDate;
            $item->end_date = $request->endDate;
            $item->price = $request->price;
            $item->id_category = $id_category->id;
            $item->save();



            Session::flash('message', 'Successfully creating!');
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        //dd($item->images['0']->name);
        if ($item->images['0']->name != "objects.png") {
            $image_path = public_path("images/items/{$item->images['0']->name}");

            if (File::exists($image_path)) {
                File::delete($image_path);
            } else {
                echo('non funziona');
            }
        }

        $item->delete();

        Session::flash('message', 'Successfully delete!');
        return Redirect::back();
    }
}
