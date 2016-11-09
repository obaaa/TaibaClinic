<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Checked;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class CheckedController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $checkeds = Checked::all();
  		return view('settings.checked.index', compact('checkeds',$checkeds));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $checkeds = Checked::all();
  		return view('settings.checked.create', compact('checkeds',$checkeds));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $checked = new Checked;
  		$checked->checked_name = Input::get('checked_name');
  		$checked->checked_price = Input::get('checked_price');
  		$checked->save();

  		Session::flash('message', 'You have successfully added Checked');
  		return Redirect::to('checkeds');
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
  		$checked = Checked::find($id);
  		return view('settings.checked.edit', compact('checked',$checked));
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
    			$rules = array(
            'checked_name' => 'required',
            'checked_price' => 'required',
    			);
    			$validator = Validator::make(Input::all(), $rules);
    			if ($validator->fails())
    			{
    				 return Redirect::to('checkeds/' . $id . '/edit')
    				->withErrors($validator);
    			} else {
    	            $checked = Checked::find($id);
    	            $checked->checked_name = Input::get('checked_name');
    	            $checked->checked_price = Input::get('checked_price');
    	            $checked->save();

    	            // redirect
    	            Session::flash('message', 'You have successfully updated Checked');
    	            return Redirect::to('checkeds');
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
  				$checked = Checked::find($id);
  		        $checked->delete();
  		        // redirect
  		        Session::flash('message', 'You have successfully deleted employee');
  		        return Redirect::to('checkeds');
  	}
}
