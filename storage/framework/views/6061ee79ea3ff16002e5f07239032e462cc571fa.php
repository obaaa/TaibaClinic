<?php $__env->startSection('titel','Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
      
      

      

      <div class="col-lg-12 col-md-12" id="toggle-detail" >
          <div class="card"  >
              <div class="header">
                  <h4 class="title">create visit</h4>
                  <?php if(Session::has('message')): ?>
                     <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                  <?php endif; ?>
              </div>
              <div class="content">
                  <form action="<?php echo e(url ('visit')); ?>" method="POST" enctype="multipart/form-data" >
                    <?php echo csrf_field(); ?>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Pationt</label>
                                  <p class="form-control border-input"><?php echo e($patient); ?></p>
                                  <input type="hidden" name="patient" value="<?php echo e($patient); ?>">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Date</label>
                                  <p class="form-control border-input">
                                    <?php echo e($visit_date); ?> |
                                    <?php echo e($stamp); ?> |
                                    <?php echo e(App\Shift::find($work_time->shift_id)->shift_name); ?>

                                  </p>
                                  <input type="hidden" name="visit_date" value="<?php echo e($visit_date); ?>">
                              </div>
                          </div>

                            <?php $user_role = App\UserRole::where('role_id','=','1')->get(); ?>

                            <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Doctor</label>
                                      <select id="doctor_id" name="doctor_id" class="form-control border-input" required="true">
                                          <?php $__currentLoopData = $user_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                          <?php
                                            $user = App\User::where('id','=',$value->user_id)->first();
                                            $employee_work_times = App\Employee_work_time::where('work_time_id','=',$work_time->id)->where('user_id','=',$user->id)->get();
                                          ?>
                                          <?php if(count($employee_work_times) != 0): ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                          <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                      </select>
                                  </div>
                              </div>
                      </div>
                      <?php
                        $divisions_times_start = $work_time->divisions_times_start_id;
                        $divisions_times_end = $work_time->divisions_times_end_id;
                        $range = $divisions_times_end - $divisions_times_start;
                      ?>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Time</label><br>&nbsp;

                                 <?php for($i=0; $i < $range; $i++): ?>

                                    <?php 
                                      $time = App\Divisions_time::where('id','=',$divisions_times_start)->first();
                                      $visit = App\Visit::where('divisions_time_id','=',$time->id)->where('visit_date','=',$visit_date)->first();
                                    ?>

                                        <?php if(count($visit) == 0): ?>
                                       <label class="radio-inline bg-info border-input"><h5><input type="radio" name="divisions_time_id" value="<?php echo e($time->id); ?>"><?php echo e($time->time); ?></input></h5></label>
                                        <?php else: ?>
                                       <label class="radio-inline bg-default border-input"><h5><input type="radio" disabled="true" name="divisions_time_id" value="<?php echo e($time->id); ?>"><?php echo e($time->time); ?></input></h5></label>
                                        <?php endif; ?>
                                   <?php $divisions_times_start++ ?>

                                 <?php endfor; ?>

                            </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-10">
                            <div class="form-group">
                                <label>checked</label><br>
                                  <?php $__currentLoopData = $checkeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <label required="true" class="checkbox-inline bg-info border-input">
                                    <input tabindex="1"  type="checkbox" name="checked[]" id="<?php echo e($value->id); ?>" value="<?php echo e($value->id); ?>"><h5><?php echo e($value->checked_name); ?>&nbsp;
                                    </h5></label>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                          </div>
                      </div>
                      <input type="hidden" name="work_time_id" value="<?php echo e($work_time->id); ?>">
                      <div class="text-center">
                          <button type="submit" class="btn btn-info btn-fill btn-wd">Go</button>
                      </div>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>