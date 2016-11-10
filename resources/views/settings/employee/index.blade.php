@extends('layouts.app')
@section('titel','employees')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">employees</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('employees/create') }}">New Employee</a>
				<hr />
@if (Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>id</td>
            <td>name</td>
						<td>phone</td>
						<td>role</td>
						<td>email</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $value)
        <tr>
            <td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->user_phone }}</td>
						<td>
							@if ($value->id != 1 )
								<?php $user_role = App\UserRole::where('user_id' ,'=', $value->id)->first();?>
								{{App\Role::find($user_role->role_id)->role_name}}
							@else
								<b>Admin</b>
							@endif
						</td>
						<td>{{ $value->email }}</td>
            <td>
							@if ($value->id != 1)
								<a class="btn btn-small btn-primary" href="{{ URL::to('employees/'.$value->id) }}">view</a>
							@endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
