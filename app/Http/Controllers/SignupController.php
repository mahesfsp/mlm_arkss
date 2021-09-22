<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Requests;
use App\Http\Requests\SignupCreateRequest;
use App\Models\Product;
use App\Models\Signup;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Validator;
use Response;
use Redirect;
//use App\Models\{Country, State, City};
class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_data =Product::all();
        $datas =Country::all();
      // $datas['countries'] =Country::get(["name", "id"]);        
       return view('signup',compact(['product_data','datas']));
      
    }

    
    public function fetchState(Request $request)
    {     
        $datas['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($datas);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignupCreateRequest $request)
    {

    // dd($request);
        Signup::create($request->all());       
        return redirect(route('signup'))->with('message','New User created successfully');
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