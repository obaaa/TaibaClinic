<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Patient;
use App\Visit;

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
      $patient_name = $request->input('patient_name');
      $patient_gender = $request->input('patient_gender');
      $patient_phone = $request->input('patient_phone');
      $patient_blood = $request->input('patient_blood');
      $patient_address = $request->input('patient_address');
      $patient_birthday = $request->input('patient_birthday');
      $patient_diseases = $request->input('patient_diseases');


      $new_patient = new Patient;
      $new_patient->patient_name = $request->patient_name;
      $new_patient->patient_gender = $request->patient_gender;
      $new_patient->patient_phone = $request->patient_phone;
      $new_patient->patient_blood = $request->patient_blood;
      $new_patient->patient_address = $request->patient_address;
      $new_patient->patient_birthday = $request->patient_birthday;
      $new_patient->patient_diseases = $request->patient_diseases;


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
        //
    }
}
