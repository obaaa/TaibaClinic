<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Patient;
use App\Visit;
use App\Add_visit;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;


class PatientController extends Controller
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
      $patients = Patient::all();
      return view('patient.index')->withpatients($patients);
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

//***************************store***************************//
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * ->patient_name
     * ->patient_gender
     * ->patient_phone
     * ->patient_blood
     * ->patient_address
     * ->patient_birthday
     * ->patient_diseases
     */
    public function store(Request $request)
    {
      $input = $request->all();

      $patient_name = Input::get('patient_name');
      $patient_gender = Input::get('patient_gender');
      $patient_phone = Input::get('patient_phone');
      $patient_blood = Input::get('patient_blood');
      $patient_address = Input::get('patient_address');
      $patient_birthday = Input::get('patient_birthday');
      $patient_diseases = Input::get('patient_diseases');

      $patient = Patient::where('patient_name','=',$patient_name)->first();
      if (count($patient) != 0) {
        Session::flash('message', 'This user already exists');
        return Redirect::to('patient');
      }


      $new_patient = new Patient;
      if (!empty($patient_phone)) {
        $new_patient->patient_phone = $input['patient_phone'];
      }
      if (!empty($patient_birthday)) {
        $new_patient->patient_birthday = $input['patient_birthday'];
      }
      $new_patient->patient_name = $input['patient_name'];
      $new_patient->patient_gender = $input['patient_gender'];
      $new_patient->patient_blood = $input['patient_blood'];
      $new_patient->patient_address = $input['patient_address'];
      $new_patient->patient_diseases = $input['patient_diseases'];


      $new_patient->save();

      return redirect('patient');
    }

//***************************show***************************//

    public function show($id)
    {
      $patient = Patient::find($id);
      $visits = Visit::where('patient_id','=',$id)->orderBy('created_at', 'desc')->get()->all();
      return view('patient.show', compact('patient',$patient,'visits',$visits));

      // return view('show',compact('patient',$patient));
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
     * ->id
     * ->patient_name
     * ->patient_gender
     * ->patient_phone
     * ->patient_blood
     * ->patient_address
     * ->patient_birthday
     * ->patient_diseases
     */
    public function update(Request $request, $id)
    {
      $patient_name = $request->input('patient_name');
      $patient_gender = $request->input('patient_gender');
      $patient_phone = $request->input('patient_phone');
      $patient_blood = $request->input('patient_blood');
      $patient_birthday = $request->input('patient_birthday');
      $patient_diseases = $request->input('patient_diseases');
      $patient_address = $request->input('patient_address');


      $patient = Patient::find($id);
      $patient->patient_name = $patient_name;
      $patient->patient_gender = $patient_gender;
      $patient->patient_phone = $patient_phone;
      $patient->patient_blood = $patient_blood;
      $patient->patient_birthday = $patient_birthday;
      $patient->patient_diseases = $patient_diseases;
      $patient->patient_address = $patient_address;
      $patient->save();

      $visits = Visit::where('patient_id','=',$id)->get();

      return view('patient.show',compact('patient',$patient,'visits',$visits));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::find($id);
      $visits = Visit::where('patient_id','=',$id)->get();
      foreach ($visits as $visit) {
        $add_visits = Add_visit::where('visit_id','=',$visit->id)->get();
        foreach ($add_visits as $value) {
          $value->delete();
        }
        $visit->delete();
      }
      $patient->delete();

      // redirect
      Session::flash('message', 'You have successfully deleted patient');
      return Redirect::to('patient');
    }
}
