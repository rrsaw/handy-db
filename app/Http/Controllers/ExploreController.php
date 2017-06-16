<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use handy\Item;

class ExploreController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->get();

        return view('explore', compact('items'));
    }
}
