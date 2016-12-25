<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Work_time;
use App\Day;
use App\UserRole;
use App\User;
use App\Shift;
use App\Checked;
use App\Patient;
use App\Visit;
use App\Divisions_time;
use App\Add_visit;
use App\Expense;

use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;

class ReportController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('report.index');
    }



    // ------------------------------------------------------
    public function visit(Request $request)
    {
      $input = $request->all();
      $from_date = Input::get('from_date');
      $to_date = Input::get('to_date');

      $visits = Visit::where('visit_date','>=',$from_date)->where('visit_date','<=',$to_date)->get();

      return view('report.visit.index',compact('visits',$visits,'from_date',$from_date,'to_date',$to_date));
    }
    // ------------------------------------------------------doctor
    public function doctor(Request $request)
    {
      $input = $request->all();
      $from_date = Input::get('from_date');
      $to_date = Input::get('to_date');
      $doctor_id = Input::get('doctor_id');

      $visits = Visit::where('visit_date','>=',$from_date)->where('visit_date','<=',$to_date)->where('doctor_id','=',$doctor_id)->get();

      return view('report.doctor.index',compact('visits',$visits,'doctor_id',$doctor_id,'from_date',$from_date,'to_date',$to_date));
    }
    // ------------------------------------------------------doctor_paid
    public function doctor_paid(Request $request)
    {
      $input = $request->all();
      $from_date = Input::get('from_date');
      $to_date = Input::get('to_date');
      $doctor_id = Input::get('doctor_id');

      $visits = Visit::where('visit_date','>=',$from_date)->where('visit_date','<=',$to_date)->where('doctor_id','=',$doctor_id)->get();

      return view('report.doctor_paid.index',compact('visits',$visits,'doctor_id',$doctor_id,'from_date',$from_date,'to_date',$to_date));
    }
    // ------------------------------------------------------
    public function visit_by_categorie(Request $request)
    {
      $input = $request->all();
      $from_date = Input::get('from_date');
      $to_date = Input::get('to_date');
      $categorie_id = Input::get('categorie_id');

      $visits = Visit::where('visit_date','>=',$from_date)->where('visit_date','<=',$to_date)->get();

      return view('report.visit_by_categorie.index',compact('categorie_id',$categorie_id,'visits',$visits,'from_date',$from_date,'to_date',$to_date));
    }
    // ------------------------------------------------------
    public function expense(Request $request)
    {
      $input = $request->all();
      $from_date = $input['from_date'];
      $to_date = $input['to_date'];

      $expenses = Expense::where('expense_date','>=',$from_date)->where('expense_date','<=',$to_date)->get();

      return view('report/expense.index', compact('expenses',$expenses,'from_date',$from_date,'to_date',$to_date));
    }



    // ------------------------------------------------------
    public function report_print(Request $request)
    {
      $input = $request->all();
      $visit_id = $input['visit_id'];
      $patient_id = $input['patient_id'];
      $medical_report = $input['medical_report'];

      $visit = Visit::find($visit_id);
      $patient = Patient::find($patient_id);


      return view('report/medical_report.index', compact('visit',$visit,'patient',$patient,'medical_report',$medical_report));
    }
    // ------------------------------------------------------
    public function report_bill($id)
    {
      $visit = Visit::find($id);

      return view('report/report_bill.index', compact('visit',$visit));
    }

}
