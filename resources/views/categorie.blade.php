@extends('layouts.app')
@section('titel','Work Time')
@section('content')
<!--overview start-->
{{-- <i class="fa fa-caret-square-o-left"></i><a href="{{ url ('product') }}"> الرجوع إلى المنتجات</a>
    <legend> </legend> --}}
    <!--overview end -->

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">categorie</div>
        <div class="panel-body">

        <!-- start form -->
        <form action="{{ url ('categorie') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
      	<fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

      	<!-- input categorie_name-->
      	<div class="form-group">
      	  <label class="col-md-4 control-label" for="categorie_name">اﻹسم</label>
      	  <div class="col-md-5">
      	  <input id="categorie_name" name="categorie_name" placeholder="name" class="form-control input-md" required="" type="text">
      	  </div>
      	</div>

      	<!-- Button -->
      	<div class="form-group">
        		<label class="col-md-4 control-label" for="submit"></label>
        		<div class="col-md-5">
          		<button id="submit" name="submit" class="btn btn-primary">حفظ</button>
        		</div>
      	</div>
      	</fieldset>
      	</form>
        <!-- End form-->

        <legend> </legend>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>اﻹسم</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td>{{$categorie->categorie_name}}</td>
                <td>
                  {{Form::open(array(
                      'route' => array( 'categorie.destroy', $categorie->id ),
                      'method' => 'delete',
                      'style' => 'display:inline',
                      'onsubmit' => "return confirm('Do you really want to delete the categorie?')",
                  ))}}
                       {{Form::submit('Delete', array('class' => 'btn btn-danger'))}}
                  {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div></div></div></div></div></div>
@stop
