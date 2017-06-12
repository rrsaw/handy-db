<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use handy\Item;
use handy\Loan;
use handy\Review;
use handy\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url = $request->path();
        $user = Auth::user();
        $id = $user->id;
        $borrow = count(Loan::where(['id_owner' => $id, 'loan_confirmation' => '1'])->get());
        $lend = count(Loan::where(['id_receiver' => $id, 'loan_confirmation' => '1'])->get());
        $reviews = Review::where('id_owner', $id)->get();
        $avgReviews = round($reviews->avg('value'));
        $items = Item::where('id_user', $id)->get();
        $view;
        if ($url == "profile") {
            $view = "profile.items";
        } elseif ($url == "profile/reviews") {
            $view = "profile.reviews";
        } elseif ($url == "profile/info") {
            $view = "profile.info";
        }

        return view($view, compact('user', 'items', 'borrow', 'lend', 'reviews', 'url', 'avgReviews'));
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
    public function show($id, Request $request)
    {
        $user = User::find($id);
        $me = Auth::user()->id;
        $borrow = count(Loan::where(['id_owner' => $id, 'loan_confirmation' => '1'])->get());
        $lend = count(Loan::where(['id_receiver' => $id, 'loan_confirmation' => '1'])->get());
        $reviews = Review::where('id_owner', $id)->get();
        $avgReviews = round($reviews->avg('value'));
        $items = Item::where('id_user', $id)->get();
        $firstCheck = Loan::where(['id_owner' => $me,'id_receiver' => $id, 'loan_confirmation' => '1'])->get()->first();
        $secondCheck = Loan::where(['id_owner' => $id,'id_receiver' => $me, 'loan_confirmation' => '1'])->get()->first();
        $url = $request->path();
        $view;
        if ($url == "profile/".$id) {
            $view = "profile.items";
        } elseif ($url == "profile/".$id."/reviews") {
            $view = "profile.reviews";
        } elseif ($url == "profile/".$id."/info" && ($firstCheck != null || $secondCheck != null)) {
            $view = "profile.info";
        }

        return view($view, compact('user', 'items', 'borrow', 'lend', 'reviews', 'url', 'avgReviews', 'firstCheck', 'secondCheck'));
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
        //
    }
}
