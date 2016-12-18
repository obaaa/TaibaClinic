<?php $__env->startSection('content'); ?>
<?php $__env->startSection('titel','edit expense'); ?>
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Expense :: Edit
                  <a href="<?php echo e(url ('expense')); ?>" class="view btn-sm active btn-default pull-right"><i class="fa fa-caret-square-o-left"></i> Back To Expenses</a>
              </div>  <div class="panel-body">

 	<?php echo e(Form::model($expense, array('route' => array('expense.update', $expense->id), 'method' => 'PUT','class' => 'form-horizontal'))); ?>


	<legend> </legend>

  <!-- Text input-->
		<div class="form-group">
	        <?php echo e(Form::label('expense_name', 'Name', array('class' => 'col-md-4 control-label'))); ?>

	        <div class="col-md-5">
	        	<?php echo e(Form::text('expense_name', null, array('class' => 'form-control input-md'))); ?>

	        </div>
    	</div>

      <!-- Text input-->
        <div class="form-group">
              <?php echo e(Form::label('expense_category', 'Category', array('class' => 'col-md-4 control-label'))); ?>

              <div class="col-md-5">
                <?php echo e(Form::select('expense_category', array('Daily' => 'Daily', 'Governmental' => 'Governmental', 'Other' => 'Other'))); ?>

              </div>
          </div>

	<!-- Text input-->
		<div class="form-group">
	        <?php echo e(Form::label('expense_price', 'price / SDG', array('class' => 'col-md-4 control-label'))); ?>

	        <div class="col-md-5">
	        	<?php echo e(Form::text('expense_price', null, array('class' => 'form-control input-md'))); ?>

	        </div>
    	</div>

      <!-- Text input-->
        <div class="form-group">
              <?php echo e(Form::label('expense_description', 'description', array('class' => 'col-md-4 control-label'))); ?>

              <div class="col-md-5">
                <?php echo e(Form::text('expense_description', null, array('class' => 'form-control input-md'))); ?>

              </div>
          </div>
          <!-- Text input-->
            <div class="form-group">
                  <?php echo e(Form::label('expense_date', 'date', array('class' => 'col-md-4 control-label'))); ?>

                  <div class="col-md-5">
                    <?php echo e(Form::text('expense_date', null, array('class' => 'form-control input-md'))); ?>

                  </div>
              </div>

	<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="submit"></label>
	  		<div class="col-md-4">
	  			<?php echo e(Form::submit('save', array('class' => 'btn btn-primary'))); ?>

			</div>
		</div>
    <?php echo e(Form::close()); ?>


  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>