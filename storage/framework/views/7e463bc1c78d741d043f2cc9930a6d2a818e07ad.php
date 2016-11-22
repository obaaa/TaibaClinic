<?php $__env->startSection('titel','employees'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo e(trans('employee.new_employee')); ?></div>
				<div class="panel-body">
					<?php echo Html::ul($errors->all()); ?>


					<?php echo Form::open(array('url' => 'employees')); ?>


					<div class="form-group">
					<?php echo Form::label('name', trans('employee.name').' *'); ?>

					<?php echo Form::text('name', Input::old('name'), array('class' => 'form-control')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('email', trans('employee.email').' *'); ?>

					<?php echo Form::text('email', Input::old('email'), array('class' => 'form-control')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('password', trans('employee.password').' *'); ?>

					<input type="password" class="form-control" name="password" placeholder="Password">
					</div>

					<div class="form-group">
					<?php echo Form::label('password_confirmation', trans('employee.confirm_password').' *'); ?>

					<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
					</div>

					<?php echo Form::submit(trans('employee.submit'), array('class' => 'btn btn-primary')); ?>


					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>