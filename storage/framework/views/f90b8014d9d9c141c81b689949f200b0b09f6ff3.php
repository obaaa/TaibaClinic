  
  <?php $__env->startSection('content'); ?>
  <?php $__env->startSection('titel','visit'); ?>
  <div class="content">
      <div class="row">
        

        
        <div class="col-md-8 col-md-8">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                  <?php $patient = App\Patient::find($visit->patient_id); ?>

                    <h4 class="title"><b><a href="#"><?php echo e($patient->patient_name); ?></a><b></h4>
                      <hr>
                    </div>
                <div class="content">
                <?php echo e(Form::model($visit, array('route' => array('visit.update', $visit->id), 'method' => 'PUT'))); ?>

                      <?php echo csrf_field(); ?>

                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
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
                          <div class="col-md-8">
                              <div class="form-group">
                                <label>checked</label><br>
                                <?php 
                                  $checkeds = App\Add_visit::where('visit_id','=',$visit->id)->get(); 
                                ?>
                                  <?php $__currentLoopData = $checkeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <?php $checked = App\Checked::find($value->checked_id); ?> 
                                    <input type="text" disabled="true" name="checked[]" class="edit border-input" value="<?php echo e($checked->checked_name); ?>">&nbsp;
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Birthday</label>

                              </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chronic Diseases</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" id="toggle-detail" style="display:none;">Update</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div>
                        <a class="edits" href="#" id="toggle-btn" onclick="toggleDetail()">Edit</a>
                        
                      </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-md-4">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">payment</h4>
                      <hr>
                <div class="content">

                </div>
            </div>
        </div>
      </div>
        <div class="col-md-4 col-md-4">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title">Add checked</h4>
                      <hr>
                <div class="content">

                </div>
            </div>
        </div>
      </div>

  
  </div>
  </div>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>