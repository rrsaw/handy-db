<?php

//////////CACNCELLA DAL DB MA NON RIESCE A DARMI UNA RESPONSE

namespace handy\Http\Controllers\v1;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use handy\Http\Controllers\Controller;
use handy\Services\v1\LoanService;

class LoanController extends Controller
{
  // laravel dependecy injection
    protected $loans;
    public function __construct(LoanService $service) {
      $this->loans = $service;

      $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = request()->input();
        $data = $this->loans->getLoans($parameters);

        return response()->json($data);


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
        $this->loans->validate($request->all());

        try {
         $loan = $this->loans->createLoan($request);
         return response()->json($loan, 201);
       } catch (Exception $e) {
         return response()->json(['message' => $e->getMessage()], 500);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->loans->getLoan($id);
        return response()->json($data);
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
      $this->loans->validate($request->all());

      try {
       $loan = $this->loans->updateLoan($request, $id);
       return response()->json($loan, 200);
     }
     catch (ModelNotFoundException $ex) {
       throw $ex;
     }
     catch (Exception $e) {
       return response()->json(['message' => $e->getMessage()], 500);
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
      try {
       $loan = $this->loans->deleteLoan($id);
       return response()->make('', 204);
     }
     catch (ModelNotFoundException $ex) {
       throw $ex;
     }
     catch (Exception $e) {
       return response()->json(['message' => $e->getMessage()], 500);
     }
    }
}
