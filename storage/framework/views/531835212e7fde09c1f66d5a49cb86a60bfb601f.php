<?php $__env->startSection('titel','Work Time'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo e(trans('New Employee Work Time')); ?></div>
				<div class="panel-body">
					<?php echo Html::ul($errors->all()); ?>


					<?php echo Form::open(array('url' => 'employee_work_time')); ?>



					
					<div class="form-group">
					<?php echo Form::label('work_times', trans('work_times').' *'); ?>

						<select id="work_time_id" name="work_time_id" class="form-control border-input">
							<?php $__currentLoopData = $work_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<option value="<?php echo e($value->id); ?>">
                  <?php echo e(App\Day::find($value->day_id)->day_name); ?> -
                  <?php echo e(App\Shift::find($value->shift_id)->shift_name); ?> - [
                  <?php echo e(App\Divisions_time::find($value->divisions_times_start_id)->time); ?> to
                  <?php echo e(App\Divisions_time::find($value->divisions_times_end_id)->time); ?> ]
                </option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</select>
					</div>
					
          
          <div class="form-group">
          <?php echo Form::label('day', trans('Employee').' *'); ?>

            <select id="user_id" name="user_id" class="form-control border-input">
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
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