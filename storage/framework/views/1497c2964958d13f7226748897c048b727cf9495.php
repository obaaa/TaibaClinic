<?php $__env->startSection('titel','checkeds'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo e(trans('employee.new_employee')); ?></div>
				<div class="panel-body">
					<?php echo Html::ul($errors->all()); ?>


					<?php echo Form::open(array('url' => 'checkeds')); ?>


					<div class="form-group">
					<?php echo Form::label('checked_name', trans('checked_name').' *'); ?>

					<?php echo Form::text('checked_name', Input::old('checked_name'), array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('checked_price', trans('price').' *'); ?>

					<?php echo Form::number('checked_price', Input::old('checked_price'), array('class' => 'form-control border-input')); ?>

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