@extends('layouts.app')
@section('titel','Work Time')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('New Work Time')}}</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'work_times')) !!}

					{{-- $days --}}
					<div class="form-group">
					{!! Form::label('day', trans('Day').' *') !!}
						<select id="day_id" name="day_id" class="form-control border-input">
		          @foreach($days as $value)
		            <option value="{{ $value->id }}">{{$value->day_name}}</option>
		          @endforeach
		        </select>
					</div>
					{{--  --}}

					{{-- $shifts --}}
					<div class="form-group">
					{!! Form::label('shifts', trans('Shifts').' *') !!}
						<select id="shift_id" name="shift_id" class="form-control border-input">
							@foreach($shifts as $value)
								<option value="{{ $value->id }}">{{$value->shift_name}}</option>
							@endforeach
						</select>
					</div>
					{{--  --}}

					{{-- $divisions_times_start--}}
					<div class="form-group">
					{!! Form::label('divisions times start', trans('Time Start').' *') !!}
						<select id="divisions_times_start_id" name="divisions_times_start_id" class="form-control border-input">
							@foreach($divisions_times as $value)
								<option value="{{ $value->id }}">{{$value->time}}</option>
							@endforeach
						</select>
					</div>
					{{--  --}}

					{{-- $divisions_times_end --}}
					<div class="form-group">
					{!! Form::label('divisions times end', trans('Time End').' *') !!}
						<select id="divisions_times_end_id" name="divisions_times_end_id" class="form-control border-input">
							@foreach($divisions_times as $value)
								<option value="{{ $value->id }}">{{$value->time}}</option>
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
