  @extends('layouts.master')
  @section('content')
  @section('titel','visit')
  <div class="content">
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
      <div class="row">
        {{-- patient visits --}}
        <div class="col-md-12 col-md-12">
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
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>ID</label>
                                  <input type="text" name="visit_id" value="{{$visit->id}}" class="edit form-control border-input" placeholder="phone">
                              </div>
                          </div>
                            <div class="col-md-3">
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
                            <div class="col-md-4">
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
                                  <?php if ($value->checked_id != 1) { ?>
                                      <input type="text" disabled="true" name="checked[]" class="edit border-input" value="{{$checked->checked_name}}">&nbsp;&nbsp;
                                    <?php } ?>
                                  @endforeach
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                            <label>Lab</label><br>

                            <table class="members_details">
                              <thead>
                                <tr>
                                  <th class="name text_align_center"><b>Name</b></th>
                                  <th class="type text_align_center"><b>Type</b></th>
                                  <th class="description text_align_center"><b>Description</b></th>
                                  <th class="status text_align_center"><b>Status</b></th>
                                  <th class="text_align_center"><b></b></th>
                                </tr>
                              </thead>
                              <tbody>
                              {{-- s --}}
                              @foreach($labs as $value)
                              <tr>
                                <td class="name">
                                  <?php $visit = App\Visit::find($value->visit_id); ?>
                                  <a href="{{ url ('visit/'.$visit->id) }}" class="" >{{App\Patient::find($visit->patient_id)->patient_name}}</a>
                                </td>
                                <td class="type">{{$value->lab_type}}</td>
                                <td class="description">
                                  <pre>{!!html_entity_decode($value->lab_description)!!}</pre>
                                </td>
                                <td class="status">{{$value->lab_status}}</td>
                                <td class="">
                                  <form method="post" action="{{url('lab_update')}}">
                                  {{ csrf_field() }}

                                    <input type="hidden" name="lab_id" value="{{$value->id}}" />

                                    <select class="form-control" name="lab_status" onchange="this.form.submit();">
                                      <option disabled selected value> -- select -- </option>
                                      <option value="In wait" >In wait</option>
                                      <option value="Completed" >Completed</option>
                                      <option value="Finish" >Finish</option>
                                    </select>
                                  </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          </div>
                        </div>
                        </div>
                </div>
              </div>
        </div>
        {{--  --}}
        <!-- <div class="col-md-12 col-md-12"> -->
        <div class="col-md-6 col-md-6">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">payment [ {{$visit->visit_price}} ]</h4>
                      <hr>
                <div class="content">
                  <form action="{{'payment'}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <label> Obtained: {{$visit->visit_paid}} |
                    Remained: {{$visit->visit_price - $visit->visit_paid}} | discount: {{$visit->discount}}%</label>
                        <div class="row">
                          <div class="col-md-2">
                            <label>pay</label>
                          </div>
                          <div class="col-md-4">

                            <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                              <div class="form-group">
                                <input type="number" value="0" name="payment" class="form-control border-input"/>
                              </div>
                          </div>
                          <div class="col-md-2">
                            <label>discount</label>
                          </div>
                          <div class="col-md-4">
                                <input type="number" placeholder="discount" value="0" name="discount" class="form-control border-input"/>
                          </div>
                          <div class="col-md-12">
                          <div class="text-center">
                              {{Form::submit('Go',array('class' => 'btn btn-info btn-fill btn-wd'))}}

                              <input type="button" class="btn btn-default" target="_blank" onclick="location.href='{{ url ('report_bill')."/"."$visit->id" }}';" value="print" />
                          </div>
                        </div>
                        </div>
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
      <!-- </div> -->
      <div class="col-md-6 col-md-6">
            <div class="card" >
                <div  class="text-center">
                  <br>
                    <h4 class="title">Checked</h4>
                      <hr>
                <div class="content">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label>add checked</label><br>
                                <?php $all_checked = App\Checked::all(); ?>
                                <form action="{{'checked'}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                                <select id="checked_id" name="checked_id" class="form-control border-input">
                                  <option disabled selected value> -- select checked -- </option>
                                  @foreach($all_checked as $value)
                                  <?php if ($value->id != 1) { ?>
                                    <option value="{{ $value->id }}">{{$value->checked_name}}</option>
                                  <?php } ?>
                                  @endforeach
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Add</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  {{--  --}}
  {{--  --}}
  <div class="col-md-6 col-md-6">
      <div class="card">
          <div  class="text-center">
            <br>
              <h4 class="title">Lab</h4>
                <hr>
          <div class="content">
            <form action="{{'lab'}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <div class="row">
                    <div class="col-md-12">
                      <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                        <div class="form-group">
                          <select class="form-control border-input" name="lab_type">
                            <option disabled selected value> -- select -- </option>
                            <option value="Crown">Crown</option>
                            <option value="Fixed prothesis">Fixed prothesis</option>
                            <option value="Removable prothesis">Removable prothesis</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                        <div class="form-group">
                          <textarea rows="5" name="lab_description" cols="50"></textarea>
                        </div>
                    </div>
                  </div>
                  <div class="text-center">
                      {{Form::submit('Add',array('class' => 'btn btn-info btn-fill btn-wd'))}}
                  </div>
                  <div class="clearfix"></div>
              </form>
          </div>
      </div>
  </div>
</div>
<div class="col-md-6 col-md-6">
      <div class="card"  >
          <div  class="text-center">
            <br>
              <h4 class="title">Image</h4>
                <hr>
          <div class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <img src="{{ url ('uploads/visit_images').'/'.$visit->visit_image }}" class="img-responsive" >
                      <div class="form-group">
                        <form enctype="multipart/form-data" action="visit_image" method="POST">
                          <input type="file" name="visit_image">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                          <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                      </div>
                    </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
{{--  --}}
  <?php $user_id = Auth::user()->id;
  $role = App\UserRole::where('user_id','=',$user_id)->first();
  if ($user_id == 1 || $role->role_id == 1) { ?>
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
              <form action="{{'print'}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                  <input type="hidden" name="patient_id" value="{{$visit->patient_id}}"/>
                  <input type="hidden" name="medical_report" value="$visit->medical_report"/>
                    <div class="box-body">
                      <div class="form-group text-center">
                        {{Form::submit('print',array('class' => 'btn btn-default'))}}
                    </div>
              </form>
          </div>
      </div>
      </div>
    </div>
    <?php
  }else { ?>
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
                <div class="box-body">
                  <div class="form-group col-md-12">
                    <blockquote><pre>{!!html_entity_decode($visit->medical_report)!!}</pre></blockquote>
                  </div>
                </div>
            </div>
        </div>
        </div>
        {{--  --}}
      {{--  --}}
      </div>
    <?php } ?>

  </div>

  @endsection
