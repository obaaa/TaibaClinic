@extends('layouts.app')
@section('titel','Work Time')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('New Employee Work Time')}}</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'employee_work_time')) !!}


					{{-- $shifts --}}
					<div class="form-group">
					{!! Form::label('work_times', trans('work_times').' *') !!}
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
					{{--  --}}

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
