<?php

namespace handy\Services\v1;

use handy\Loan;
use handy\User;

class LoanService {



  public function getLoans($parameters) {
    if (empty($parameters)) {
        return $this->filterLoans(Loan::all());
    }

    if (isset($parameters['include'])) {
        $includeParms = explode(',', $parameters['include']);
    }

  }

  public function getLoan($id) {
    return $this->filterLoans(Loan::where('id', $id)->get());
  }

  public function createLoan($req) {
    $id = $req->input('id');

    $loan = new Loan();
    // $loan->id = $id;
    $loan->id = $req->input('id');
    $loan->start_date = $req->input('start_date');
    $loan->id_owner = $req->input('id_owner');
    $loan->start_date = $req->input('start_date');
    $loan->id_reciver = $req->input('id_receiver');
    $loan->id_item = $req->input('id_item');
    $loan->loan_confermation = $req->input('loan_confirmation');
    $loan->return_confermation = $req->input('return_confirmation');

    $loan->save();

    return $this->filterLoans([$loan]);

    // return $loan;


  }

  protected function filterLoans($loans) {
      $data = [];
      foreach ($loans as $loan) {
          $entry = [
              'id' => $loan->id,
              'start_date' => $loan->start_date,
              // 'href' => route('loans.show', ['id' => $loan->id])
              'id_owner' => $loan->id_owner,
              'id_receiver' => $loan->id_reciver,
              'id_item' => $loan->id_item,
              'loan_confirmation' => $loan->loan_confermation,
              'return_confirmation' => $loan->return_confermation,

          ];

          $data[] = $entry;
      }
      return $data;
  }
}
