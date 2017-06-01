<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use handy\Item;
use Auth;
use Session;
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

        //Log::info($items);

      return view('items.published', compact('items'));
        //return view(print_r($items));
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
        //
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
        //
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
        $image_path = public_path("images/items/{$item->images['0']->name}");

        if (File::exists($image_path)) {
            File::delete($image_path);
        } else {
            echo('non funziona');
        }

        $item->delete();

        Session::flash('message', 'Successfully delete!');
        return Redirect::back();
    }
}
