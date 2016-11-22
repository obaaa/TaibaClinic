@extends('layouts.app')
@section('titel','employees')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('update employee')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($employee, array('route' => array('employees.update', $employee->id), 'method' => 'PUT')) !!}
					<div class="form-group">
					{!! Form::label('name', trans('name').' *') !!}
					{!! Form::text('name', null, array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('email').' *') !!}
					{!! Form::text('email', null, array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('user_phone', trans('phone').' *') !!}
					{!! Form::text('user_phone', null, array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('role_name', trans('role').' *') !!}
					<?php
					$user_role = App\UserRole::where('user_id' ,'=', $employee->id)->first();
					$role = App\Role::where('id' ,'=', $user_role->role_id)->first();
					?>
					<select id="role_id" name="role_id" class="form-control border-input">
						<option value="{{$role->id}}" selected="on">{{$role->role_name}}</option>
						@foreach($roles as $value)
							@if ($value->id != $role->id)
								<option value="{{$value->id}}">{{$value->role_name}}</option>
							@endif
						@endforeach
					</select>
					{{-- {!! Form::select('role_name', ['3' => 'receptionist','2' => 'doctor'],Input::old('name'), array('class' => 'form-control border-input'))!!} --}}
					</div>

					<div class="form-group">
					{!! Form::label('password', trans('password')) !!}
					<input type="password" class="form-control border-input" name="password" placeholder="Password">
					</div>

					<div class="form-group">
					{!! Form::label('password_confirmation', trans('confirm password')) !!}
					<input type="password" class="form-control border-input" name="password_confirmation" placeholder="Confirm Password">
					</div>

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
