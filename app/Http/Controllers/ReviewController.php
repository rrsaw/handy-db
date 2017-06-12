<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator;
use Auth;
use Input;
use handy\Item;
use handy\Review;
use handy\Loan;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $rules = array(
       'review' => 'required|string',
       'rating' => 'required|numeric|min:1',
      );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            dd($validator);
            return Redirect::back()->withErrors($validator);
        } else {
            $loan = Loan::find($request->loan);

            $review = new Review;
            $review->description = $request->review;
            $review->value = $request->rating;
            $review->date = Carbon::today()->toDateString();
            $review->id_item = $loan->item->id;
            $review->id_owner = $loan->owner->id;
            $review->id_reviewer = Auth::user()->id;
            $review->id_loan = $loan->id;
            $review->save();

            Session::flash('message', 'Successfully creating!');
            return Redirect::to('/history');
        }
    }
}
