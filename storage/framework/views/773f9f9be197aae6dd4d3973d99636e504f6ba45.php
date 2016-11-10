<?php $__env->startSection('titel','employees'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo e($employee->name); ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Job:</td>
                        <td>
													<?php if($employee->id != 1 ): ?>
														<?php $user_role = App\UserRole::where('user_id', '=', $employee->id)->first(); ?>
														<?php echo e(App\Role::find($user_role->role_id)->role_name); ?>

													<?php else: ?>
														<b>Admin</b>
													<?php endif; ?>
												</td>
                      </tr>
                      <tr>
                        <td>Phone Number:</td>
                        <td><a href="tel:<?php echo e($employee->user_phone); ?>"><?php echo e($employee->user_phone); ?></a></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><a href="mailto:<?php echo e($employee->email); ?>"><?php echo e($employee->email); ?></a></td>
                      </tr>
                    </tbody>
                  </table>

                  
                </div>
              </div>
            </div>
            <div class="panel-footer">
                  
                  
										<?php if($employee->id != 1): ?>
			                <a class="btn btn-small btn-info" href="<?php echo e(URL::to('employees/' . $employee->id . '/edit')); ?>">Edit</a>
			                <?php echo Form::open(array('url' => 'employees/' . $employee->id, 'class' => 'pull-right')); ?>

			                    <?php echo Form::hidden('_method', 'DELETE'); ?>

			                    <?php echo Form::submit(trans('Delete'), array('class' => 'btn btn-warning')); ?>

			                <?php echo Form::close(); ?>

										<?php endif; ?>
									
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
 

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-warning">
				<div class="panel-heading">Shift</div>
				<div class="panel-body">


          <?php echo Form::open(array('url' => 'employee_work_time')); ?>

                <?php echo csrf_field(); ?>

          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>No</td>
          						<td>day</td>
          						<td>shift</td>
          						<td>start</td>
          						<td>end</td>
                      <td>&nbsp;</td>
                  </tr>
              </thead>
              <tbody>
          			<?php $i = 1; ?>
              <?php $__currentLoopData = $work_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <tr>
                      <td><?php echo e($i); ?></td>
          						<td><?php echo e(App\Day::find($value->day_id)->day_name); ?></td>
          						<td><?php echo e(App\Shift::find($value->shift_id)->shift_name); ?></td>
          						<td><?php echo e(App\Divisions_time::find($value->divisions_times_start_id)->time); ?></td>
          						<td><?php echo e(App\Divisions_time::find($value->divisions_times_end_id)->time); ?></td>
                      <td>

                        <input type="hidden" value="<?php echo e($value->id); ?>" name="work_time_id[]">

                        <select class="form-control" name="check[]">
                          <?php
                            $employee_work_time = App\Employee_work_time::where('user_id','=',$employee->id)->where('work_time_id','=',$value->id)->first();
                            if (!empty($employee_work_time)) {
                              // echo "<option value="1">Yes</option><option value="0">NO</option>";
                              echo ('<option value="1">Yes</option>');
                              echo ('<option value="0">No</option>');
                            }else {
                              echo ('<option value="0">No</option>');
                              echo ('<option value="1">Yes</option>');
                            }
                          ?>
                        </select>
                      </td>
                  </tr><?php $i++; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

              <input type="hidden" value="<?php echo e($employee->id); ?>" name="user_id">

              </tbody>
          </table>
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