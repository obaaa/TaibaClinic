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
					<?php echo Form::label('name', trans('name').' *'); ?>

					<?php echo Form::text('name', Input::old('name'), array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('email', trans('email').' *'); ?>

					<?php echo Form::text('email', Input::old('email'), array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('user_phone', trans('phone').' *'); ?>

					<?php echo Form::number('user_phone', Input::old('user_phone'), array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('role', trans('role').' *'); ?>

					<select class="form-control" name="role_id">
						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<option value="<?php echo e($role->id); ?>"><?php echo e($role->role_name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</select>
					</div>

					<div class="form-group">
					<?php echo Form::label('password', trans('password').' *'); ?>

					<input type="password" class="form-control border-input" name="password" placeholder="Password">
					</div>

					<div class="form-group">
					<?php echo Form::label('password_confirmation', trans('confirm password').' *'); ?>

					<input type="password" class="form-control border-input" name="password_confirmation" placeholder="Confirm Password">
					</div>

					<div class="text-center">
					<?php echo Form::submit(trans('save'), array('class' => 'btn btn-info btn-fill btn-wd')); ?>

					</div>

					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>