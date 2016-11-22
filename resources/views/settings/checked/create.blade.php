@extends('layouts.app')
@section('titel','checkeds')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('employee.new_employee')}}</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'checkeds')) !!}

					<div class="form-group">
					{!! Form::label('checked_name', trans('checked_name').' *') !!}
					{!! Form::text('checked_name', Input::old('checked_name'), array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('checked_price', trans('price').' *') !!}
					{!! Form::number('checked_price', Input::old('checked_price'), array('class' => 'form-control border-input')) !!}
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
