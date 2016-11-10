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
					<?php echo Form::label('day', trans('Day').' '); ?>

						<select id="day_id" name="day_id" class="form-control border-input">
							<option value="<?php echo e($work_time->day_id); ?>" selected="on"><?php echo e(App\Day::find($work_time->day_id)->day_name); ?></option>
							<?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php if($value->id != $work_time->day_id): ?>
									<option value="<?php echo e($value->id); ?>"><?php echo e($value->day_name); ?></option>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</select>
					</div>
					

					
					<div class="form-group">
					<?php echo Form::label('day', trans('Shift').' '); ?>

						<select id="shift_id" name="shift_id" class="form-control border-input">
							<option value="<?php echo e($work_time->shift_id); ?>" selected="on"><?php echo e(App\Shift::find($work_time->shift_id)->shift_name); ?></option>
							<?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php if($value->id != $work_time->shift_id): ?>
									<option value="<?php echo e($value->id); ?>"><?php echo e($value->shift_name); ?></option>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</select>
					</div>
					

					
					<div class="form-group">
					<?php echo Form::label('day', trans('Start').' '); ?>

						<select id="divisions_times_start_id" name="divisions_times_start_id" class="form-control border-input">
							<option value="<?php echo e($work_time->divisions_times_start_id); ?>" selected="on"><?php echo e(App\Divisions_time::find($work_time->divisions_times_start_id)->time); ?></option>
							<?php $__currentLoopData = $divisions_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php if($value->id != $work_time->divisions_times_start_id): ?>
									<option value="<?php echo e($value->id); ?>"><?php echo e($value->time); ?></option>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</select>
					</div>
					

					
					<div class="form-group">
					<?php echo Form::label('day', trans('End').' '); ?>

						<select id="divisions_times_end_id" name="divisions_times_end_id" class="form-control border-input">
							<option value="<?php echo e($work_time->divisions_times_end_id); ?>" selected="on"><?php echo e(App\Divisions_time::find($work_time->divisions_times_end_id)->time); ?></option>
							<?php $__currentLoopData = $divisions_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php if($value->id != $work_time->divisions_times_end_id): ?>
									<option value="<?php echo e($value->id); ?>"><?php echo e($value->time); ?></option>
								<?php endif; ?>
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