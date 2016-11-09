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

					{!! Form::model($checked, array('route' => array('checkeds.update', $checked->id), 'method' => 'PUT')) !!}
					<div class="form-group">
					{!! Form::label('checked_name', trans('name').' *') !!}
					{!! Form::text('checked_name', null, array('class' => 'form-control border-input')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('checked_price', trans('price').' *') !!}
					{!! Form::number('checked_price', null, array('class' => 'form-control border-input')) !!}
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
