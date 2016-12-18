@extends('layouts.app')
@section('titel','checkeds')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">checked</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('checkeds/create') }}">New checked</a>
				<hr />
@if (Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No</td>
            <td>name</td>
            <td>price</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
			<?php $i = 1; ?>
    @foreach($checkeds as $value)
		<?php if ($value->id != 1): ?>
			<tr>
					<td>{{ $i }}</td>
					<td>{{ $value->checked_name }}</td>
					<td>{{ $value->checked_price }}</td>
					<td>

							<a class="btn btn-small btn-info" href="{{ URL::to('checkeds/' . $value->id . '/edit') }}">Edit</a>
							{!! Form::open(array('url' => 'checkeds/' . $value->id, 'class' => 'pull-right')) !!}
									{!! Form::hidden('_method', 'DELETE') !!}
									{!! Form::submit(trans('Delete'), array('class' => 'btn btn-warning')) !!}
							{!! Form::close() !!}
					</td>
			</tr><?php $i++; ?>
		<?php endif; ?>
    @endforeach
    </tbody>
</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
