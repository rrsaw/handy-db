<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use handy\Item;
use handy\Loan;
use handy\Review;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = $user->id;
        $borrow = count(Loan::where(['id_owner' => $id, 'loan_confirmation' => '1'])->get());
        $lend = count(Loan::where(['id_receiver' => $id, 'loan_confirmation' => '1'])->get());
        $review = count(Review::where('id_reviewer', $id)->get());
        $items = Item::where('id_user', $id)->get();

        return view('profile.items', compact('items', 'user', 'borrow', 'lend', 'review'));
    }

    public function info()
    {
        $user = Auth::user();
        $id = $user->id;
        $borrow = count(Loan::where(['id_owner' => $id, 'loan_confirmation' => '1'])->get());
        $lend = count(Loan::where(['id_receiver' => $id, 'loan_confirmation' => '1'])->get());
        $review = count(Review::where('id_reviewer', $id)->get());
        $items = Item::where('id_user', $id)->get();
        // $password = Crypt::decrypt($user->password);

        return view('profile.info', compact('items', 'user', 'borrow', 'lend', 'review'));
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
        //
    }
}
