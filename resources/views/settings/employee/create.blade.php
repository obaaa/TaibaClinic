@extends('layouts.app')
@section('titel','employees')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('employee.new_employee')}}</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'employees')) !!}

					<div class="form-group">
					{!! Form::label('name', trans('name').' *') !!}
					{!! Form::text('name', Input::old('name'), array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('email').' *') !!}
					{!! Form::text('email', Input::old('email'), array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('user_phone', trans('phone').' *') !!}
					{!! Form::number('user_phone', Input::old('user_phone'), array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('role', trans('role').' *') !!}
					<select class="form-control" name="role_id">
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->role_name}}</option>
						@endforeach
					</select>
					</div>

					<div class="form-group">
					{!! Form::label('password', trans('password').' *') !!}
					<input type="password" class="form-control border-input" name="password" placeholder="Password">
					</div>

					<div class="form-group">
					{!! Form::label('password_confirmation', trans('confirm password').' *') !!}
					<input type="password" class="form-control border-input" name="password_confirmation" placeholder="Confirm Password">
					</div>

					<div class="text-center">
					{!! Form::submit(trans('save'), array('class' => 'btn btn-info btn-fill btn-wd')) !!}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
