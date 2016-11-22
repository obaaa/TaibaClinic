@extends('layouts.app')
@section('titel','work time')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('work time')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($work_time, array('route' => array('work_times.update', $work_time->id), 'method' => 'PUT')) !!}

					{{-- $days --}}
					<div class="form-group">
					{!! Form::label('day', trans('Day').' ') !!}
						<select id="day_id" name="day_id" class="form-control border-input">
							<option value="{{ $work_time->day_id }}" selected="on">{{App\Day::find($work_time->day_id)->day_name}}</option>
							@foreach($days as $value)
								@if ($value->id != $work_time->day_id)
									<option value="{{ $value->id }}">{{$value->day_name}}</option>
								@endif
							@endforeach
						</select>
					</div>
					{{--  --}}

					{{-- $shifts --}}
					<div class="form-group">
					{!! Form::label('day', trans('Shift').' ') !!}
						<select id="shift_id" name="shift_id" class="form-control border-input">
							<option value="{{ $work_time->shift_id }}" selected="on">{{App\Shift::find($work_time->shift_id)->shift_name}}</option>
							@foreach($shifts as $value)
								@if ($value->id != $work_time->shift_id)
									<option value="{{ $value->id }}">{{$value->shift_name}}</option>
								@endif
							@endforeach
						</select>
					</div>
					{{--  --}}

					{{-- $divisions_times start --}}
					<div class="form-group">
					{!! Form::label('day', trans('Start').' ') !!}
						<select id="divisions_times_start_id" name="divisions_times_start_id" class="form-control border-input">
							<option value="{{ $work_time->divisions_times_start_id }}" selected="on">{{App\Divisions_time::find($work_time->divisions_times_start_id)->time}}</option>
							@foreach($divisions_times as $value)
								@if ($value->id != $work_time->divisions_times_start_id)
									<option value="{{ $value->id }}">{{$value->time}}</option>
								@endif
							@endforeach
						</select>
					</div>
					{{--  --}}

					{{-- $divisions_times end --}}
					<div class="form-group">
					{!! Form::label('day', trans('End').' ') !!}
						<select id="divisions_times_end_id" name="divisions_times_end_id" class="form-control border-input">
							<option value="{{ $work_time->divisions_times_end_id }}" selected="on">{{App\Divisions_time::find($work_time->divisions_times_end_id)->time}}</option>
							@foreach($divisions_times as $value)
								@if ($value->id != $work_time->divisions_times_end_id)
									<option value="{{ $value->id }}">{{$value->time}}</option>
								@endif
							@endforeach
						</select>
					</div>
					{{--  --}}


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
