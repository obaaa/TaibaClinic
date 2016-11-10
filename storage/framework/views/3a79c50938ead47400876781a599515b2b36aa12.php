<?php $__env->startSection('titel','work time'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo e(trans('work time')); ?></div>

				<div class="panel-body">
					<?php echo Html::ul($errors->all()); ?>


					<?php echo Form::model($work_time, array('route' => array('work_times.update', $work_time->id), 'method' => 'PUT')); ?>


					
					<div class="form-group">
					<?php echo Form::label('day', trans('Day').' *'); ?>

						<select id="day_id" name="day_id" class="form-control border-input">
							<option value="<?php echo e($work_time->id); ?>" selected ><?php echo e($work_time->day_name); ?></option>
		          <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		            <option value="<?php echo e($value->id); ?>"><?php echo e($value->day_name); ?></option>
		          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		        </select>
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