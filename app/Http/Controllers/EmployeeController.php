<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\UserRole;
use App\Role;
use App\Shift_employee;
use App\Work_time;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class EmployeeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$employees = User::all();
		$user_roles = UserRole::all();
		return view('settings.employee.index', compact('employees',$employees,'user_roles',$user_roles));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// $userroles = UserRole::all();
		//
		// $items = array();
		//
		// foreach ($userroles as $userrole)
		// {
		//     $items[$userrole->id] = $userrole->role_name;
		// }
		$roles = Role::all();
		return view('settings.employee.create', compact('roles',$roles));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$users = new User;
		$users->name = Input::get('name');
		$users->email = Input::get('email');
		$users->user_phone = Input::get('user_phone');
		$users->password = Hash::make(Input::get('password'));
		$users->save();

		$role_id = Input::get('role_id');
		// $user=Input::get('name');
		$user = User::where('name','=',Input::get('name'))->get()->last();

		$new_role = new UserRole;
		$new_role->user_id = $user->id;
		$new_role->role_id = $role_id;
		$new_role->save();

		Session::flash('message', 'You have successfully added employee');
		return Redirect::to('employees');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$employee = User::find($id);
		if ($id == 1) {
			Session::flash('message', 'No Permission');
			return Redirect::to('employees');
		} else {
			$user_role = UserRole::where('user_id','=',$id)->first();
			$roles = Role::all();
      $work_times = Work_time::all();
			$shift_employees = Shift_employee::all();
			$shift_user = Shift_employee::where('user_id','=',$id)->get();
			return view('settings.employee.view', compact('employee',$employee,'user_role',$user_role,'roles',$roles,'shift_user',$shift_user,'work_times',$work_times));
		}
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
		if ($id == 1) {
			Session::flash('message', 'No Permission');
			return Redirect::to('employees');
		} else {
			$user_role = UserRole::where('user_id','=',$id)->first();
			$roles = Role::all();
			return view('settings.employee.edit', compact('employee',$employee,'user_role',$user_role,'roles',$roles));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

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
	            if(!empty(Input::get('password')))
	            {
	            	$users->password = Hash::make(Input::get('password'));
	            }
	            $users->save();
							$role_id =Input::get('role_id');
							$UserRole = UserRole::where('user_id','=',$users->id)->get()->last();
							$UserRole->role_id = $role_id;
							$UserRole->save();

	            // redirect
	            Session::flash('message', 'You have successfully updated employee');
	            return Redirect::to('employees');
	        }
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
			Session::flash('message', 'You cannot delete admin on TutaPOS demo');
			Session::flash('alert-class', 'alert-danger');
	            return Redirect::to('employees');
		}
		else
		{
			try
			{
				$users = User::find($id);
		        $users->delete();
		        // redirect
		        Session::flash('message', 'You have successfully deleted employee');
		        return Redirect::to('employees');
	    	}
	    	catch(\Illuminate\Database\QueryException $e)
    		{
        		Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
        		Session::flash('alert-class', 'alert-danger');
		        return Redirect::to('employees');
	    	}
	    }
	}

}
