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
use App\Lab;
use Image;

use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;


  class VisitController extends Controller
  {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user_id = Auth::user()->id;
      $role = UserRole::where('user_id','=',$user_id)->first();
      if ($user_id == 1 || $role->role_id == 2) {
        $visits = Visit::orderBy('created_at', 'desc')->paginate(15);
        return view('visit.index', ['visits' => $visits]);
      } else {
        $visits = Visit::where('doctor_id','=',$user_id)->orderBy('created_at', 'desc')->paginate(15);
        return view('visit.index', ['visits' => $visits]);
      }

      $visits = Visit::orderBy('created_at', 'desc')->paginate(15);
      return view('visit.index', ['visits' => $visits]);
    }
    public function visit_check(Request $request) //دالة لاختبار المدخلات من نمازج تسجيل الزيارات
    {
        // تفريغ المتغيرات المرسلة
        $patient = Input::get('patient');
        $visit_date = Input::get('visit_date');
        $doctor = Input::get('doctor');
        $shift_id = Input::get('Shift_id');
        // إتختبار ما إذا كانت البيانات المرسلة مرسلة من نموزج المريض
        if(!empty($patient) && !empty($visit_date) && !empty($shift_id)){
            // معرفة اسم اليوم من الاسبوع على حسب التاريخ المعطى
            $date_stamp = strtotime(date('Y-m-d', strtotime($visit_date)));
            $stamp = date('l', $date_stamp);
            // جلب الوردية واليوم المكافئين للمدخلان من قاعدة البيانات إن وجدت
            $day = Day::where('day_name','=',$stamp)->first();
            $work_time = Work_time::where('shift_id','=',$shift_id)->where('day_id','=',$day->id)->first();

            // إختبار هل تم إرجاع قيمة بالمتغير؟
            if (count($work_time) != 0){ //في حالة وجود قيمة ترسل المتغيرات لصفحة تسجيل الزياره حسب المريض
                    $users = User::all();
                    $work_time_id = $work_time->id;
                    $checkeds = Checked::all();

            $visits = Visit::where('visit_date','=',$visit_date)->get();

                    // الزهاب لصفحة تسجيل الزيارات حسب المريض .. مع إرسال اسم المريض, تاريخ الزيارة, وقت العمل, الوردية
                    return view('visit.by_patient', compact('patient',$patient,'visit_date',$visit_date,'stamp',$stamp,'work_time',$work_time,'checkeds',$checkeds,'visits',$visits));
                }else{ //في حالة عدم وجود قيمة مرجعة يتم اعادة التوجيه للصفحة الرئيسية مع إرسال رسالة توضيحية
                    Session::flash('message', 'Date or Shift is not available');
                    return Redirect::to('home');
                }
           } elseif(empty($patient) && empty($visit_date) && !empty($doctor)) {// في حالة إرسال البيانات من نموزج الطبيب
            echo "okok";
        }
    }

    public function visit_image(Request $request)
    {
      $input = $request->all();
      $visit_id = Input::get('visit_id');

      if($request->hasFile('visit_image')){
        $visit_image = $request->file('visit_image');
        $filename = time() . '.' . $visit_image->getClientOriginalExtension();
        // Image::make($visit_image)->resize(200, 200)->save(public_path('/uploads/visit_images/' . $filename));
        Image::make($visit_image)->save(public_path('/uploads/visit_images/' . $filename));

        $new_image = Visit::find($visit_id);
        $new_image->visit_image = $filename;
        $new_image->save();
      }
      $visit = Visit::find($visit_id);
      $patient = Patient::where('id','=',$visit->patient_id)->first();
      Session::flash('message', 'successfully');
      return Redirect::route('visit.show', ['visit' =>  $visit, 'patient' => $patient]);
    }

    public function add_to_lab(Request $request)
    {

      $input = $request->all();
      $lab_type = Input::get('lab_type');
      $lab_description = Input::get('lab_description');
      $visit_id = Input::get('visit_id');

      $new_lab = new Lab;
      $new_lab->lab_type = $lab_type;
      $new_lab->lab_description = $lab_description;
      $new_lab->visit_id = $visit_id;
      $new_lab->lab_status = "In wait";
      $new_lab->save();

      $visit = Visit::find($visit_id);
      $patient = Patient::where('id','=',$visit->patient_id)->first();
      Session::flash('message', 'successfully');
      return Redirect::route('visit.show', ['visit' =>  $visit, 'patient' => $patient]);
    }

    public function store(Request $request)
    {

      $input = $request->all();
      $patient = Input::get('patient');
      $visit_date = Input::get('visit_date');
      $doctor_id = Input::get('doctor_id');
      $divisions_time_id = Input::get('divisions_time_id');
      $work_time_id = Input::get('work_time_id');
      $discount = Input::get('discount');

      if (count($divisions_time_id) == 0) {
        Session::flash('message', 'select time');
        return Redirect::to('home');
      }

      $patient = Patient::where('patient_name','=',$patient)->first();
      $patient_id = $patient->id;

      $visit = Visit::where('visit_date','=',$visit_date)->where('divisions_time_id','=',$divisions_time_id)->first();

      if (count($visit) == 0) {
       $new_visit = new Visit;
       $new_visit->patient_id = $patient_id;
       $new_visit->doctor_id = $doctor_id;
       $new_visit->work_time_id = $work_time_id;
       //$new_visit->visit_price =
       $new_visit->visit_paid = 0;
       $new_visit->discount = $discount;
       $new_visit->visit_date = $visit_date;
       $new_visit->divisions_time_id = $divisions_time_id;
       $new_visit->save();
       //
       $visit = Visit::all()->last();
       $visit_id = $visit->id;
       $checked[]=$request->input('checked[]');

       for($i=0; $i < count($input['checked']);$i++){

        //add new add_visit
        $new_add_visit = new Add_visit;
         $new_add_visit->checked_id = $input['checked'][$i];
         $new_add_visit->visit_id = $visit_id;
        $new_add_visit->save();

        // get checked_price
        $checked_id = $input['checked'][$i];
        $checked = Checked::where('id','=',$checked_id)->first();
          $checked_price = $checked->checked_price;

        // +visit_price
        $add_to_visit = Visit::find($visit_id);
        $add_to_visit->visit_price = $add_to_visit->visit_price + $checked_price;
        $add_to_visit->save();

       }

       $add_to_visit = Visit::find($visit_id);
       $add_to_visit->visit_price = $add_to_visit->visit_price - (($add_to_visit->visit_price * $discount)/100);
       $add_to_visit->save();

       Session::flash('message', 'You have successfully added visit');
       return redirect()->action('PatientController@show', ['id' => $patient_id]);

      }else{
         Session::flash('message', 'Date or Shift is not available');
         return Redirect::to('home');
      }
    }

    public function medical_report(Request $request)
    {
      $input = $request->all();

     $medical_report = Input::get('medical_report');
     $visit_id = Input::get('visit_id');
     $patient_id = Input::get('patient_id');

     $visit = Visit::find($visit_id);
     $visit->medical_report = $medical_report;
     $visit->save();

     $visit = Visit::find($visit_id);
     $patient = Patient::where('id','=',$visit->patient_id)->first();
     Session::flash('message', 'successfully');
     return Redirect::route('visit.show', ['visit' =>  $visit, 'patient' => $patient]);

    //  return view ('visit.show',compact('visit',$visit));
     }


     public function payment(Request $request)
     {
       $input = $request->all();

      $visit_id = Input::get('visit_id');
      $payment = Input::get('payment');
      $discount = Input::get('discount');

      $visit = Visit::find($visit_id);
      $visit_price = $visit->visit_price;

      $price = $visit_price - (($visit_price * $discount)/100);
      $visit->visit_price = $price;
      $paid = $price - ($visit->visit_paid);

      if ($payment <= $paid) {

        $visit->visit_paid = ($visit->visit_paid) + ($payment);
        if ($discount != 0) {
          $visit->discount = $discount;
        }
      $visit->save();

      Session::flash('message', 'successfully');
      $patient = Patient::where('id','=',$visit->patient_id)->first();

      $labs = Lab::where('visit_id','=',$visit->id)->get();
      return view('visit.show', ['visit' =>  $visit, 'patient' => $patient, 'labs' => $labs]);

      // return Redirect::route('visit.show', ['visit' =>  $visit, 'patient' => $patient]);

      // return view ('visit.show',compact('visit',$visit,'patient',$patient));

      } else {
        Session::flash('message', 'Erorr');
        $patient = Patient::where('id','=',$visit->patient_id)->first();
        $labs = Lab::where('visit_id','=',$visit->id)->get();
        return view('visit.show', ['visit' =>  $visit, 'patient' => $patient, 'labs' => $labs]);
      }
      }


      public function checked(Request $request)
      {
        $input = $request->all();

       $visit_id = Input::get('visit_id');
       $checked_id = Input::get('checked_id');

      //  $visit = Visit::find($visit_id);
      //  $checked = Checked::find($checked_id);
       //add new add_visit
       $new_add_visit = new Add_visit;
        $new_add_visit->checked_id = $checked_id;
        $new_add_visit->visit_id = $visit_id;
       $new_add_visit->save();

       // get checked_price
       $checked = Checked::where('id','=',$checked_id)->first();
         $checked_price = $checked->checked_price;

       // +visit_price
       $add_to_visit = Visit::find($visit_id);
        $add_to_visit->visit_price = $add_to_visit->visit_price + $checked_price;
       $add_to_visit->save();

      Session::flash('message', 'You have successfully added checked');
      $visit = $add_to_visit;
      $patient = Patient::where('id','=',$visit->patient_id)->first();
      return Redirect::route('visit.show', ['visit' =>  $visit, 'patient' => $patient]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $visit = Visit::find($id);
     $labs = Lab::where('visit_id','=',$visit->id)->get();
     $patient = Patient::where('id','=',$visit->patient_id)->first();
     return view('visit.show', ['visit' =>  $visit, 'patient' => $patient, 'labs' => $labs]);
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

    public function destroy($id)
    {
      $visit = Visit::find($id);
      $add_visits = Add_visit::where('visit_id','=',$id)->get();
      foreach ($add_visits as $value) {
        $value->delete();
      }
      $visit->delete();
      // redirect
      Session::flash('message', 'You have successfully deleted visit');
      return Redirect::to('visit');
    }
}
