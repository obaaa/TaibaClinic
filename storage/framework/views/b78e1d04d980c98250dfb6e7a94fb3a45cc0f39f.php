<?php $__env->startSection('titel','Work Time'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo e(trans('New Work Time')); ?></div>
				<div class="panel-body">
					<?php echo Html::ul($errors->all()); ?>


					<?php echo Form::open(array('url' => 'work_times')); ?>


					
					<div class="form-group">
					<?php echo Form::label('day', trans('Day').' *'); ?>

						<select id="day_id" name="day_id" class="form-control border-input">
		          <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		            <option value="<?php echo e($value->id); ?>"><?php echo e($value->day_name); ?></option>
		          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		        </select>
					</div>
					

					
					<div class="form-group">
					<?php echo Form::label('shifts', trans('Shifts').' *'); ?>

						<select id="shift_id" name="shift_id" class="form-control border-input">
							<?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<option value="<?php echo e($value->id); ?>"><?php echo e($value->shift_name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</select>
					</div>
					

					
					<div class="form-group">
					<?php echo Form::label('divisions times start', trans('Time Start').' *'); ?>

						<select id="divisions_times_start_id" name="divisions_times_start_id" class="form-control border-input">
							<?php $__currentLoopData = $divisions_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<option value="<?php echo e($value->id); ?>"><?php echo e($value->time); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</select>
					</div>
					

					
					<div class="form-group">
					<?php echo Form::label('divisions times end', trans('Time End').' *'); ?>

						<select id="divisions_times_end_id" name="divisions_times_end_id" class="form-control border-input">
							<?php $__currentLoopData = $divisions_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<option value="<?php echo e($value->id); ?>"><?php echo e($value->time); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</select>
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