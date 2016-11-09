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

                  {{-- <a href="#" class="btn btn-primary">employee shift</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a> --}}
                </div>
              </div>
            </div>
            <div class="panel-footer">
                  {{-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> --}}
                  {{-- <span class="pull-right"> --}}
										@if ($employee->id != 1)
			                <a class="btn btn-small btn-info" href="{{ URL::to('employees/' . $employee->id . '/edit') }}">Edit</a>
			                {!! Form::open(array('url' => 'employees/' . $employee->id, 'class' => 'pull-right')) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-warning')) !!}
			                {!! Form::close() !!}
										@endif
									{{-- </span> --}}
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
					{{--  --}}
					<div class="form-group">
					{!! Form::label('work_times', trans('add work time').' *') !!}
						<select id="work_time_id" name="work_time_id" class="form-control border-input">
							@foreach($work_times as $value)
								<option value="{{ $value->id }}">
                  {{App\Day::find($value->day_id)->day_name}} -
                  {{App\Shift::find($value->shift_id)->shift_name}} - [
                  {{App\Divisions_time::find($value->divisions_times_start_id)->time}} to
                  {{App\Divisions_time::find($value->divisions_times_end_id)->time}} ]
                </option>
							@endforeach
						</select>
					</div>

          {{ $employee->id }}
          {{ Form::hidden('user_id', $employee->id) }}

					{{--  --}}
					<div class="text-center">
					{!! Form::submit(trans('add'), array('class' => 'btn btn-info btn-fill btn-wd')) !!}
					</div>
					{!! Form::close() !!}<br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>id</td>
            <td>name</td>
						<td>phone</td>
						<td>role</td>
						<td>email</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    {{-- @foreach($employees as $value) --}}
        <tr>
            <td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
						<td>5</td>
            <td>6</td>
        </tr>
    {{-- @endforeach --}}
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
