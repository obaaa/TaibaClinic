<?php $__env->startSection('titel','employees'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo e(trans('update employee')); ?></div>

				<div class="panel-body">
					<?php echo Html::ul($errors->all()); ?>


					<?php echo Form::model($employee, array('route' => array('settings.update', $employee->id), 'method' => 'PUT')); ?>

					<div class="form-group">
					<?php echo Form::label('name', trans('name').' *'); ?>

					<?php echo Form::text('name', null, array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('email', trans('email').' *'); ?>

					<?php echo Form::text('email', null, array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('user_phone', trans('phone').' *'); ?>

					<?php echo Form::text('user_phone', null, array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('role', trans('role').' *'); ?>

					<?php echo Form::select('role', ['3' => 'receptionist','2' => 'doctor'],Input::old('name'), array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('password', trans('password')); ?>

					<input type="password" class="form-control border-input" name="password" placeholder="Password">
					</div>

					<div class="form-group">
					<?php echo Form::label('password_confirmation', trans('confirm password')); ?>

					<input type="password" class="form-control border-input" name="password_confirmation" placeholder="Confirm Password">
					</div>

					<div class="text-center">
					<?php echo Form::submit(trans('update'), array('class' => 'btn btn-info btn-fill btn-wd')); ?>

				  </div>

					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>