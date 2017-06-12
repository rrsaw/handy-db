<?php

namespace handy\Http\Controllers;

use Illuminate\Http\Request;
use handy\Item;
use handy\Loan;
use Auth;
use Session;
use Redirect;
use Route;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function requestLoan(Request $request)
    {
        $item = Item::find($request->item);

        $loan = new Loan;
        $loan->start_date = $request->startDate;
        $loan->end_date = $request->endDate;
        $loan->loan_confirmation = "0";
        $loan->return_confirmation = "0";
        $loan->id_owner = $item->user->id;
        $loan->id_receiver = Auth::user()->id;
        $loan->id_item = $item->id;
        $loan->save();

        Session::flash('message', 'Request loan sent!');
        return Redirect::back();
    }

    public function indexCurrent(Request $request)
    {
        $id = Auth::user()->id;
        $url = $request->path();

        if ($url == "current") {
            $restrictions = ['id_owner' => $id, 'loan_confirmation' => '1', 'return_confirmation' => '0' ];
        } elseif ($url == "current/other") {
            $restrictions = ['id_receiver' => $id, 'loan_confirmation' => '1', 'return_confirmation' => '0' ];
        }

        $loans = Loan::where($restrictions)->get();

        foreach ($loans as $loan) {
            if ($loan->end_date->isPast()) {
                $loan->return_confirmation = "1";
                $loan->save();
            }
        }

        $today = Carbon::today();

        return view('items.current', compact('loans', 'today', 'url'));
    }

    public function indexConfirmation(Request $request)
    {
        $id = Auth::user()->id;
        $url = $request->path();
        if ($url == "confirmation") {
            $restrictions = ['id_owner' => $id, 'loan_confirmation' => '0', 'return_confirmation' => '0' ];
        } elseif ($url == "confirmation/other") {
            $restrictions = ['id_receiver' => $id, 'loan_confirmation' => '0', 'return_confirmation' => '0' ];
        }
        $loans = Loan::where($restrictions)->get();

        return view('items.confirmation', compact('loans', 'url'));
    }

    public function indexHistory(Request $request)
    {
        $id = Auth::user()->id;
        $url = $request->path();
        if ($url == "history") {
            $restrictions = ['id_owner' => $id, 'loan_confirmation' => '1', 'return_confirmation' => '1' ];
        } elseif ($url == "history/other") {
            $restrictions = ['id_receiver' => $id, 'loan_confirmation' => '1', 'return_confirmation' => '1' ];
        }
        // $checkArray = ['id_reviewer' => $id, 'id_' => '1', 'return_confirmation' => '1' ];
        // $check = Review::where
        $loans = Loan::where($restrictions)->get();

        return view('items.history', compact('loans', 'url'));
    }

    public function activeLoan(Request $request)
    {
        $id = $request->id;
        $loan = Loan::find($id);
        $loan->loan_confirmation = "1";
        $loan->save();
        return Redirect::back();
    }
    public function deleteLoan(Request $request)
    {
        $id = $request->id;
        $loan = Loan::find($id);
        $loan->delete();
        return Redirect::back();
    }
}
