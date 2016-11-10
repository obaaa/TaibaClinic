  
  <?php $__env->startSection('content'); ?>
  <?php $__env->startSection('titel','patient > show'); ?>
  <div class="content">
      <div class="row">
        

        
        <div class="col-md-8 col-md-8">
            <div class="card"  >
                <div  class="text-center">
                  <br>
                    <h4 class="title"><b><?php echo e($patient->patient_name); ?><b></h4>
                      <hr>
                    </div>
                <div class="content">
                <?php echo e(Form::model($patient, array('route' => array('patient.update', $patient->id), 'method' => 'PUT'))); ?>

                      <?php echo csrf_field(); ?>

                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"  name="patient_name" value="<?php echo e($patient->patient_name); ?>" class="edit form-control border-input" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="patient_gender" value="<?php echo e($patient->patient_gender); ?>" class="edit form-control border-input">
                                      <option selected value="<?php echo e($patient->patient_gender); ?>"><?php echo e($patient->patient_gender); ?></option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="number" name="patient_phone" value="<?php echo e($patient->patient_phone); ?>" class="edit form-control border-input" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select name="patient_blood" value="<?php echo e($patient->patient_blood); ?>" class="edit form-control border-input">
                                      <option selected value="<?php echo e($patient->patient_blood); ?>"><?php echo e($patient->patient_blood); ?></option>
                                      <option value="O−">O−</option>
                                      <option value="O+">O+</option>
                                      <option value="A−">A−</option>
                                      <option value="A+">A+</option>
                                      <option value="B−">B−</option>
                                      <option value="B+">B+</option>
                                      <option value="AB−">AB−</option>
                                      <option value="AB+">AB+</option>
                                    </select>
                                  </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-8">
                              <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="patient_address" value="<?php echo e($patient->patient_address); ?>" class="edit form-control border-input" placeholder="Home Address">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Birthday</label>
                                  <input type="date" name="patient_birthday" value="<?php echo e($patient->patient_birthday); ?>" class="edit form-control border-input">
                              </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chronic Diseases</label>
                                    <textarea rows="5" name="patient_diseases" class="edit form-control border-input" placeholder="Description"><?php echo e($patient->patient_diseases); ?></textarea>
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
                    <h4 class="title">New Visit</h4>
                      <hr>
                <div class="content">
                    <form action="<?php echo e(action('PatientController@update',['id'=>$patient->id])); ?>" method="put">
                      <?php echo csrf_field(); ?>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Date</label>
                                  <input type="date" name="patient_birthday" class="form-control border-input">
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
        
        
        <div class="col-lg-12 col-md-12">
            <div class="card">
            <div class="header">
              <h4 class="title">Visits</h4>
            </div>
            <div class="content">
              <div class="input-group col-md-12">
        		      <input type="search" class="light-table-filter" data-table="members_details" placeholder="Quick Filter">
              </div>
              <div class="text-center">
        		  <table class="members_details">
          			<thead>
          				<tr>
          					<th class="patient_name text_align_center"><b>Date</b></th>
          					<th class="patient_gender text_align_center"><b>Doctor</b></th>
          					<th class="patient_phone text_align_center"><b>Invoice value</b></th>
                    <th class="patient_birthday text_align_center"><b>pid</b></th>
          				</tr>
          			</thead>
          			<tbody>


          			<tr>
          				<td class="patient_name"><a href="<?php echo e(url ('#')); ?>" class="" ></a></td>
                  <td class="patient_gender"></td>
          				<td class="patient_phone text_align_center"></td>
                  <td class="patient_birthday"></td>
          			</tr>

          		</tbody>
        		</table>
          </div>
          </div>
      </div>
    </div>
  
  </div>
  </div>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>