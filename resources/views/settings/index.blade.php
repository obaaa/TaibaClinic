@extends('layouts.app')
@section('titel','employees')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">settings</div>

				<div class="panel-body">
				<!-- <a class="btn btn-small btn-success" href="{{ URL::to('employees/create') }}">New Employee</a> -->
				<hr />
@if (Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
