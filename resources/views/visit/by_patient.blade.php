@extends('layouts.master')
@section('titel','by patient')

@section('content')
<div class="content">
    <div class="row">

      <div class="col-lg-12 col-md-12" id="toggle-detail" >
          <div class="card"  >
              <div class="header">
                  <h4 class="title">create visit</h4>
                  @if (Session::has('message'))
                     <div class="alert alert-info">{{ Session::get('message') }}</div>
                  @endif
              </div>
              <div class="content">
                  <form action="{{ url ('visit') }}" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Pationt</label>
                                  <p class="form-control border-input">{{$patient}}</p>
                                  <input type="hidden" name="patient" value="{{$patient}}">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Date</label>
                                  <p class="form-control border-input">
                                    {{$visit_date}} |
                                    {{$stamp}} |
                                    {{App\Shift::find($work_time->shift_id)->shift_name}}
                                  </p>
                                  <input type="hidden" name="visit_date" value="{{$visit_date}}">
                              </div>
                          </div>
                            <?php $user_role = App\UserRole::where('role_id','=','1')->get(); ?>
                            <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Doctor</label>
                                      <select id="doctor_id" name="doctor_id" class="form-control border-input" required="true">
                                        <option disabled selected value> -- select doctor -- </option>
                                          @foreach($user_role as $value)
                                          <?php
                                            $user = App\User::where('id','=',$value->user_id)->first();
                                            $employee_work_times = App\Employee_work_time::where('work_time_id','=',$work_time->id)->where('user_id','=',$user->id)->get();
                                          ?>
                                          @if (count($employee_work_times) != 0)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endif
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                      </div>
                      <?php
                        $divisions_times_start = $work_time->divisions_times_start_id;
                        $divisions_times_end = $work_time->divisions_times_end_id;
                        $range = $divisions_times_end - $divisions_times_start;
                      ?>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Time</label><br>&nbsp;
                                 @for ($i=0; $i < $range; $i++)
                                    <?php
                                      $time = App\Divisions_time::where('id','=',$divisions_times_start)->first();
                                      $visit = App\Visit::where('divisions_time_id','=',$time->id)->where('visit_date','=',$visit_date)->first();
                                    ?>
                                        @if (count($visit) == 0)
                                       <label class="radio-inline bg-info border-input"><h5><input type="radio" name="divisions_time_id" value="{{$time->id}}">{{$time->time}}</input></h5></label>
                                        @else
                                       <label class="radio-inline bg-default border-input"><h5><input type="radio" disabled="true" name="divisions_time_id" value="{{$time->id}}">{{$time->time}}</input></h5></label>
                                        @endif
                                   <?php $divisions_times_start++ ?>
                                 @endfor
                            </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-10">
                            <div class="form-group">
                                <label>checked</label><br>
                                  @foreach($checkeds as $value)
                                    <label required="true" class="checkbox-inline bg-info border-input">
                                      <?php if ($value->id != 1) { ?>
                                        <input tabindex="1" type="checkbox" name="checked[]" id="{{$value->id}}" value="{{$value->id}}"><h5>{{$value->checked_name}}&nbsp;
                                      <?php } ?>
                                    </h5></label>
                                  @endforeach
                                  <input type="hidden" name="checked[]" value="1" />
                            </div>
                          </div>
                      </div>
                      <input type="hidden" name="work_time_id" value="{{$work_time->id}}">
                      <input type="hidden" name="discount" value="0" />
                      <div class="text-center">
                          <button type="submit" class="btn btn-info btn-fill btn-wd">Go</button>
                      </div>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>
      </div>
@endsection
