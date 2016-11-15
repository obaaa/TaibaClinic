<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;


class VisitController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *->patient
     *->visit_date
     *->doctor_id
     *->visit_time
     *->checked
     *->work_time
     */
    public function store(Request $request)
    {

      $patient = Input::get('patient');
      $visit_date = Input::get('visit_date');
      $doctor_id = Input::get('doctor_id');//
      $divisions_time_id = Input::get('divisions_time_id');//
      $work_time_id = Input::get('work_time_id');//


      $patient = Patient::where('patient_name','=',$patient)->first();
      $patient_id = $patient->id;//

      $visit = Visit::where('visit_date','=',$visit_date)->where('divisions_time_id','=',$divisions_time_id)->first();

      if (count($visit) == 0) {
          $new_visit = new Visit;
          $new_visit->patient_id = $patient_id;
          $new_visit->doctor_id = $doctor_id;
          //$new_visit->receptionist_id = $receptionist_id;
          $new_visit->work_time_id = $work_time_id;
          //$new_visit->visit_price = 
          //$new_visit->visit_paid = 
          $new_visit->visit_date = $visit_date;
          $new_visit->divisions_time_id = $divisions_time_id;
          $new_visit->save();

          $visit = Visit::all()->last();

          $visit_id = $visit->id;


          $checked = Input::get('checked');
          for($i=0; $i < count($checked);$i++){

            $add_visit = new Add_visit;
            $add_visit->checked_id = $checked[$i];
            $add_visit->visit_id = $visit_id;
            $add_visit->save();
          }
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
