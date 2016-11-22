@extends('layouts.app')
@section('titel','employees')

@section('content')
<div class="container">
	<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$employee->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Job:</td>
                        <td>
													@if ($employee->id != 1 )
														<?php $user_role = App\UserRole::where('user_id', '=', $employee->id)->first(); ?>
														{{App\Role::find($user_role->role_id)->role_name}}
													@else
														<b>Admin</b>
													@endif
												</td>
                      </tr>
                      <tr>
                        <td>Phone Number:</td>
                        <td><a href="tel:{{ $employee->user_phone }}">{{ $employee->user_phone }}</a></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
										@if ($employee->id != 1)
			                <a class="btn btn-small btn-info" href="{{ URL::to('employees/' . $employee->id . '/edit') }}">Edit</a>
			                {!! Form::open(array('url' => 'employees/' . $employee->id, 'class' => 'pull-right')) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-warning')) !!}
			                {!! Form::close() !!}
										@endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
 {{--  --}}

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-warning">
				<div class="panel-heading">Shift</div>
				<div class="panel-body">


          {!! Form::open(array('url' => 'employee_work_time')) !!}
                {!! csrf_field() !!}
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>No</td>
          						<td>day</td>
          						<td>shift</td>
          						<td>start</td>
          						<td>end</td>
                      <td>&nbsp;</td>
                  </tr>
              </thead>
              <tbody>
          			<?php $i = 1; ?>
              @foreach($work_times as $value)
                  <tr>
                      <td>{{ $i }}</td>
          						<td>{{App\Day::find($value->day_id)->day_name}}</td>
          						<td>{{App\Shift::find($value->shift_id)->shift_name}}</td>
          						<td>{{App\Divisions_time::find($value->divisions_times_start_id)->time}}</td>
          						<td>{{App\Divisions_time::find($value->divisions_times_end_id)->time}}</td>
                      <td>

                        <input type="hidden" value="{{$value->id}}" name="work_time_id[]">

                        <select class="form-control" name="check[]">
                          <?php
                            $employee_work_time = App\Employee_work_time::where('user_id','=',$employee->id)->where('work_time_id','=',$value->id)->first();
                            if (!empty($employee_work_time)) {
                              // echo "<option value="1">Yes</option><option value="0">NO</option>";
                              echo ('<option value="1">Yes</option>');
                              echo ('<option value="0">No</option>');
                            }else {
                              echo ('<option value="0">No</option>');
                              echo ('<option value="1">Yes</option>');
                            }
                          ?>
                        </select>
                      </td>
                  </tr><?php $i++; ?>
              @endforeach

              <input type="hidden" value="{{$employee->id}}" name="user_id">

              </tbody>
          </table>
          <div class="text-center">
          {!! Form::submit(trans('update'), array('class' => 'btn btn-info btn-fill btn-wd')) !!}
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
