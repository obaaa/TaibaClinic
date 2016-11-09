@extends('layouts.app')
@section('titel','Work Time')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Work Time</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('work_times/create') }}">New Work Time</a>
				<hr />
@if (Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

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

                <a class="btn btn-small btn-info" href="{{ URL::to('work_times/' . $value->id . '/edit') }}">Edit</a>
                {!! Form::open(array('url' => 'work_times/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
        </tr><?php $i++; ?>
    @endforeach
    </tbody>
</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
