<?php

namespace handy\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use handy\Http\Controllers\Controller;
use handy\Services\v1\AddressService;

class AddressController extends Controller
{
    protected $addresses;
    public function __construct(AddressService $service)
    {
        $this->addresses = $service;

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
        $data = $this->addresses->getAddresses($parameters);
      // $data = $this->addresses->getAddresses($parameters);

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
        $this->addresses->validate($request->all());

        try {
            $address = $this->addresses->createAddress($request);
            return response()->json($address, 201);
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
        $data = $this->addresses->getAddress($id);
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
        $this->addresses->validate($request->all());

        try {
            $address = $this->address->updateAddress($request, $id);
            return response()->json($address, 200);
        } catch (ModelNotFoundException $ex) {
            throw $ex;
        } catch (Exception $e) {
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
            $address = $this->address->deleteAddress($id);
            return response()->json($address, 200);
        } catch (ModelNotFoundException $ex) {
            throw $ex;
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
