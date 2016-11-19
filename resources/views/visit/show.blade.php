  @extends('layouts.master')
  @section('content')
  @section('titel','visit')
  <div class="content">
      <div class="row">
        {{-- patient visits --}}
        <div class="col-md-8 col-md-8">
            <div class="card">
                <div class="text-center">
                  <br>
                  <?php $patient = App\Patient::find($visit->patient_id); ?>
                    <h4 class="title"><b><a href="#">{{$patient->patient_name}}</a><b></h4>
                      <hr>
                </div>
                <div class="content">
                {{-- {{ Form::model($visit, array('route' => array('visit.update', $visit->id), 'method' => 'PUT')) }} --}}
                      {!! csrf_field() !!}
                      {{-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Doctor</label>
                                    <?php $doctor = App\User::find($visit->doctor_id); ?>
                                    <?php $user_role = App\UserRole::where('role_id','=','1')->get(); ?>
                                    <select name="doctor_id" value="{{$doctor->name}}" class="edit form-control border-input">
                                          @foreach($user_role as $value)
                                            <?php
                                              $user = App\User::where('id','=',$value->user_id)->first();
                                            ?>
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Date</label>
                                    <?php
                                      $date_stamp = strtotime(date('Y-m-d', strtotime($value->visit_date)));
                                      $stamp = date('l', $date_stamp);
                                    ?>
                                    <input type="text" name="visit_date" value="{{$stamp}} - {{$visit->visit_date}}" class="edit form-control border-input" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>time</label>
                                    <?php $time = App\Divisions_time::find($visit->divisions_time_id)->time; ?>
                                    <input type="text" name="visit_date" value="{{$time}}" class="edit form-control border-input" placeholder="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label>checked</label><br>
                                <?php
                                  $checkeds = App\Add_visit::where('visit_id','=',$visit->id)->get();
                                ?>
                                  @foreach($checkeds as $value)
                                  <?php $checked = App\Checked::find($value->checked_id); ?>
                                    <input type="text" disabled="true" name="checked[]" class="edit border-input" value="{{$checked->checked_name}}">&nbsp;&nbsp;
                                  @endforeach
                              </div>
                          </div>
                        </div>
                        <div class="row">
                        </div>
                        {{-- <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
                        </div>
                        <div class="clearfix"></div> --}}
                    </form>
                </div>
              </div>
        </div>
        {{--  --}}
        <div class="col-md-4 col-md-4">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">payment</h4>
                      <hr>
                <div class="content">
                  <form action="{{'payment'}}" method="POST">
                      {!! csrf_field() !!}
                        <div class="row">
                          <div class="col-md-12">
                            <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                              <div class="form-group">
                                <label>price : {{$visit->visit_price}}</label><br>
                                <label>paid : {{$visit->visit_paid}}</label>
                                  <input type="number" name="payment" class="form-control border-input">
                              </div>
                          </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">go</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
      </div>
        <div class="col-md-4 col-md-4">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">Add checked</h4>
                      <hr>
                <div class="content">
{{--                     <form action="{{action('PatientController@update',['id'=>$patient->id])}}" method="put">
                      {!! csrf_field() !!}
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Date</label>
                                  <input type="date" name="patient_birthday" class="form-control border-input">
                              </div>
                          </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">go</button>
                        </div>
                        <div class="clearfix"></div>
                    </form> --}}
                </div>
            </div>
        </div>
      </div>
  {{--  --}}
  <div class="col-md-12 col-md-12">
    <div class="card">
        <div  class="text-center">
          <br>
          <?php $patient = App\Patient::find($visit->patient_id); ?>

          <h4 class="title"><b><a href="#">medical report</a><b></h4>
          <hr>
        </div>
        <div class="content">
          <div class="row">
          <form action="{{'medical_report'}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
              <input type="hidden" name="patient_id" value="{{$visit->patient_id}}"/>
                <div class="box-body">
                  <div class="form-group col-md-12">
                    <textarea rows="10" name="medical_report" cols="50">{{$visit->medical_report}}</textarea>
                  </div>
                  <div class="form-group text-center">
                    {{Form::submit('Save Report',array('class' => 'btn btn-info btn-fill btn-wd'))}}
                  </div>
                </div>
          </form>
        </div>
    </div>
    </div>
    {{--  --}}
  {{--  --}}
  </div>
  </div>

  @endsection
