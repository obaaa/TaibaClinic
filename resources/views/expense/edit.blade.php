@extends('layouts.master')
@section('content')
@section('titel','edit expense')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Expense :: Edit
                  <a href="{{ url ('expense') }}" class="view btn-sm active btn-default pull-right"><i class="fa fa-caret-square-o-left"></i> Back To Expenses</a>
              </div>  <div class="panel-body">

 	{{ Form::model($expense, array('route' => array('expense.update', $expense->id), 'method' => 'PUT','class' => 'form-horizontal')) }}

	<legend> </legend>

  <!-- Text input-->
		<div class="form-group">
	        {{ Form::label('expense_name', 'Name', array('class' => 'col-md-4 control-label')) }}
	        <div class="col-md-5">
	        	{{ Form::text('expense_name', null, array('class' => 'form-control input-md')) }}
	        </div>
    	</div>

      <!-- Text input-->
        <div class="form-group">
              {{ Form::label('expense_category', 'Category', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-5">
                {{ Form::select('expense_category', array('Daily' => 'Daily', 'Governmental' => 'Governmental', 'Other' => 'Other')) }}
              </div>
          </div>

	<!-- Text input-->
		<div class="form-group">
	        {{ Form::label('expense_price', 'price / SDG', array('class' => 'col-md-4 control-label')) }}
	        <div class="col-md-5">
	        	{{ Form::text('expense_price', null, array('class' => 'form-control input-md')) }}
	        </div>
    	</div>

      <!-- Text input-->
        <div class="form-group">
              {{ Form::label('expense_description', 'description', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-5">
                {{ Form::text('expense_description', null, array('class' => 'form-control input-md')) }}
              </div>
          </div>
          <!-- Text input-->
            <div class="form-group">
                  {{ Form::label('expense_date', 'date', array('class' => 'col-md-4 control-label')) }}
                  <div class="col-md-5">
                    {{ Form::text('expense_date', null, array('class' => 'form-control input-md')) }}
                  </div>
              </div>

	<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="submit"></label>
	  		<div class="col-md-4">
	  			{{ Form::submit('save', array('class' => 'btn btn-primary')) }}
			</div>
		</div>
    {{ Form::close() }}

  </div>
</div>
</div>
@endsection
