  
  <?php $__env->startSection('content'); ?>
  <?php $__env->startSection('titel','visit'); ?>
  <div class="content">
    <?php if(Session::has('message')): ?>
       <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
      <div class="row">
        
        <div class="col-md-12 col-md-12">
            <div class="card">
                <div class="text-center">
                  <br>
                  <?php $patient = App\Patient::find($visit->patient_id); ?>
                    <h4 class="title"><b><a href="#"><?php echo e($patient->patient_name); ?></a><b></h4>
                      <hr>
                </div>
                <div class="content">
                
                      <?php echo csrf_field(); ?>

                      
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Doctor</label>
                                    <?php $doctor = App\User::find($visit->doctor_id); ?>
                                    <?php $user_role = App\UserRole::where('role_id','=','1')->get(); ?>
                                    <select name="doctor_id" value="<?php echo e($doctor->name); ?>" class="edit form-control border-input">
                                          <?php $__currentLoopData = $user_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php
                                              $user = App\User::where('id','=',$value->user_id)->first();
                                            ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Date</label>
                                    <?php
                                      $date_stamp = strtotime(date('Y-m-d', strtotime($value->visit_date)));
                                      $stamp = date('l', $date_stamp);
                                    ?>
                                    <input type="text" name="visit_date" value="<?php echo e($stamp); ?> - <?php echo e($visit->visit_date); ?>" class="edit form-control border-input" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>time</label>
                                    <?php $time = App\Divisions_time::find($visit->divisions_time_id)->time; ?>
                                    <input type="text" name="visit_date" value="<?php echo e($time); ?>" class="edit form-control border-input" placeholder="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label>checked</label><br>
                                <?php
                                  $checkeds = App\Add_visit::where('visit_id','=',$visit->id)->get();
                                ?>
                                  <?php $__currentLoopData = $checkeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <?php $checked = App\Checked::find($value->checked_id); ?>
                                  <?php if ($value->checked_id != 158) { ?>
                                      <input type="text" disabled="true" name="checked[]" class="edit border-input" value="<?php echo e($checked->checked_name); ?>">&nbsp;&nbsp;
                                    <?php } ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </div>
                          </div>
                        </div>
                </div>
              </div>
        </div>
        
        <div class="col-md-12 col-md-12">
        <div class="col-md-6 col-md-6">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">payment</h4>
                      <hr>
                <div class="content">
                  <form action="<?php echo e('payment'); ?>" method="POST">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div class="row">
                          <div class="col-md-12">
                            <input type="hidden" name="visit_id" value="<?php echo e($visit->id); ?>"/>
                              <div class="form-group">
                                <label>price: <?php echo e($visit->visit_price); ?></label> |
                                <label>paid: <?php echo e($visit->visit_paid); ?></label> |
                                <label>Residual: <?php echo e($visit->visit_price - $visit->visit_paid); ?></label>
                                <input type="number" name="payment" class="form-control border-input"/>
                              </div>
                          </div>
                        </div>
                        <div class="text-center">
                            <?php echo e(Form::submit('go',array('class' => 'btn btn-info btn-fill btn-wd'))); ?>

                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
      </div>
        <div class="col-md-6 col-md-6">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">Add checked</h4>
                      <hr>
                <div class="content">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label>checked</label><br>
                                <?php $all_checked = App\Checked::all(); ?>
                                <form action="<?php echo e('checked'); ?>" method="POST">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                <input type="hidden" name="visit_id" value="<?php echo e($visit->id); ?>"/>
                                <select id="checked_id" name="checked_id" class="form-control border-input">
                                  <option disabled selected value> -- select checked -- </option>

                                  <?php $__currentLoopData = $all_checked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <?php if ($value->id != 158) { ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->checked_name); ?></option>
                                  <?php } ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">go</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  
  <?php $user_id = Auth::user()->id;
  $role = App\UserRole::where('user_id','=',$user_id)->first();
  if ($user_id == 1 || $role->role_id == 1) { ?>
    <div class="col-md-12 col-md-12">
      <div class="card">
          <div  class="text-center">
            <br>
            <?php $patient = App\Patient::find($visit->patient_id); ?>

            <h4 class="title"><b><a href="#">medical report</a><b></h4>
            <hr>
          </div>
          <div class="content">
            <div class="row">
              <form action="<?php echo e('medical_report'); ?>" method="POST">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                  <input type="hidden" name="visit_id" value="<?php echo e($visit->id); ?>"/>
                  <input type="hidden" name="patient_id" value="<?php echo e($visit->patient_id); ?>"/>
                    <div class="box-body">
                      <div class="form-group col-md-12">
                        <textarea rows="10" name="medical_report" cols="50"><?php echo e($visit->medical_report); ?></textarea>
                      </div>
                      <div class="form-group text-center">
                        <?php echo e(Form::submit('Save Report',array('class' => 'btn btn-info btn-fill btn-wd'))); ?>

                      </div>
                      <!-- <div class="form-group text-center">
                        <button type="button" class="btn  btn-fill btn-wd" name="button"><a href="<?php echo e(URL::to('/print')); ?>"><i class="fa fa-print" aria-hidden="true"></i><a></button>
                      </div> -->
                    </div>
              </form>
              <form action="<?php echo e('print'); ?>" method="POST">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                  <input type="hidden" name="visit_id" value="<?php echo e($visit->id); ?>"/>
                  <input type="hidden" name="patient_id" value="<?php echo e($visit->patient_id); ?>"/>
                  <input type="hidden" name="medical_report" value="$visit->medical_report"/>
                    <div class="box-body">
                      <div class="form-group text-center">
                        <?php echo e(Form::submit('print',array('class' => 'btn btn-fill btn-wd'))); ?>

                    </div>
              </form>
          </div>
      </div>
      </div>
    </div>
    <?php
  }else { ?>
      <div class="col-md-12 col-md-12">
        <div class="card">
            <div  class="text-center">
              <br>
              <?php $patient = App\Patient::find($visit->patient_id); ?>

              <h4 class="title"><b><a href="#">medical report</a><b></h4>
              <hr>
            </div>
            <div class="content">
              <div class="row">
                <div class="box-body">
                  <div class="form-group col-md-12">
                    <blockquote><pre><?php echo html_entity_decode($visit->medical_report); ?></pre></blockquote>
                  </div>
                </div>
            </div>
        </div>
        </div>
        
      
      </div>
    <?php } ?>

  </div>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>