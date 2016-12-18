<?php $__env->startSection('titel','employees'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo e(trans('update employee')); ?></div>

				<div class="panel-body">
					<?php echo Html::ul($errors->all()); ?>


					<?php echo Form::model($checked, array('route' => array('checkeds.update', $checked->id), 'method' => 'PUT')); ?>

					<div class="form-group">
					<?php echo Form::label('checked_name', trans('name').' *'); ?>

					<?php echo Form::text('checked_name', null, array('class' => 'form-control border-input')); ?>

					</div>

					<div class="form-group">
					<?php echo Form::label('checked_price', trans('price').' *'); ?>

					<?php echo Form::number('checked_price', null, array('class' => 'form-control border-input')); ?>

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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>