<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserRole;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class SettingsController extends Controller {
	public function __construct()
  {
      $this->middleware('auth');
  }

	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			$employees = User::all();
			$user_roles = UserRole::all();
			return view('settings.index', compact('employees',$employees,'user_roles',$user_roles));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	// public function create()
	// {
	// 		return view('employee.create');
	// }

	/**
	 * Store a newly created resource in storage.
	 *role user_phone
	 * @return Response
	 */
	public function store(Request $request)
	{
	            // store
	            $users = new User;
	            $users->name = Input::get('name');
							$users->email = Input::get('email');
							$users->user_phone = Input::get('user_phone');
	            $users->password = Hash::make(Input::get('password'));
	            $users->save();

							$role=Input::get('role');
							$user=Input::get('name');
							$user = User::where('name','=',$user)->get()->last();

							$new_role = new UserRole;
							$new_role->user_id = $user->id;
							$new_role->role_name = $role;
							$new_role->save();

	            Session::flash('message', 'You have successfully added employee');
	            return Redirect::to('settings');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employee = User::find($id);
		$user_roles = UserRole::all();
		return view('settings.employee.edit', compact('employee',$employee,'user_roles',$user_roles));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id  user_phone
	 * @return Response
	 */
	public function update($id)
	{
		// if($id == 1)
		// {
		// 	Session::flash('message', 'You cannot edit admin on clinic box');
		// 	Session::flash('alert-class', 'alert-danger');
	  //           return Redirect::to('settings');
		// }
		// else
		// {
			$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users,email,' . $id .'',
			'password' => 'min:6|max:30|confirmed',
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails())
			{
				 return Redirect::to('employees/' . $id . '/edit')
				->withErrors($validator);
			} else {
	            $users = User::find($id);
	            $users->name = Input::get('name');
							$users->email = Input::get('email');
							$users->user_phone = Input::get('user_phone');
	            if(!empty(Input::get('password')))
	            {
	            	$users->password = Hash::make(Input::get('password'));
	            }
	            $users->save();

							$role=Input::get('role');
							$user=Input::get('name');
							$user = User::where('name','=',$user)->get()->last();

							$new_role = new UserRole;
							$new_role->user_id = $user->id;
							$new_role->role_name = $role;
							$new_role->save();

	            // redirect
	            Session::flash('message', 'You have successfully updated employee');
	            return Redirect::to('employees');
	        }
	    //}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($id == 1)
		{
			Session::flash('message', 'You cannot delete admin on clinic box');
			Session::flash('alert-class', 'alert-danger');
	            return Redirect::to('settings');
		}
		else
		{
			try
			{
				$users = User::find($id);
		        $users->delete();
		        // redirect
		        Session::flash('message', 'You have successfully deleted employee');
		        return Redirect::to('settings');
	    	}
	    	catch(\Illuminate\Database\QueryException $e)
    		{
        		Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
        		Session::flash('alert-class', 'alert-danger');
		        return Redirect::to('settings');
	    	}
	    }
	}

}
