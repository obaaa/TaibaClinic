  
  <?php $__env->startSection('content'); ?>
  <?php $__env->startSection('titel','visits'); ?>
  <div class="content">
    <?php if(Session::has('message')): ?>
       <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
      <div class="row">
        <div class="col-md-12 col-md-12">
          <div class="card">
            <div class="container">
              <div class="row">
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
                      <th class="name text_align_center"><b>Name</b></th>
                      <th class="date text_align_center"><b>Date</b></th>
                      <th class="day text_align_center"><b>Day | Time</b></th>
            					<th class="doctor text_align_center"><b>Doctor</b></th>
            					<th class="value text_align_center"><b>value | pid </b></th>
                      <th class="status text_align_center"><b>Status</b></th>
                      <th class="delete text_align_center"><b>delete</b></th>
            				</tr>
            			</thead>
            			<tbody>
                  
                  <?php $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            			<tr>
                    <td class="name">
                      <a href="<?php echo e(url ('visit/'.$value->id)); ?>" class="" ><?php echo e(App\Patient::find($value->patient_id)->patient_name); ?></a>
                    </td>
                    <td class="date">
                      <?php echo e($value->visit_date); ?>

                    </td>
                    <td class="day">
                      <?php
                        $date_stamp = strtotime(date('Y-m-d', strtotime($value->visit_date)));
                        $stamp = date('l', $date_stamp);
                      ?>
                      <?php echo e($stamp); ?> | <?php echo e(App\Divisions_time::find($value->divisions_time_id)->time); ?>

                    </td>
                    </td>
                    <td class="doctor">
                      <?php echo e(App\User::find($value->doctor_id)->name); ?>

                    </td>
            				<td class="value text_align_center">
                      <?php echo e($value->visit_price); ?> | <?php echo e($value->visit_paid); ?>

                    </td>
                    <td class="status">
                      <?php if ($value->visit_price != $value->visit_paid) { ?>
                        <b>incomplete</b>
                      <?php } elseif($value->visit_price == $value->visit_paid && $value->visit_price != 0) { ?>
                        <b>complete</b>
                      <?php }elseif ($value->visit_price == 0) { ?>
                        <b>new</b>
                      <?php } ?>
                    </td>
                    <td class="delete">
                      <?php echo e(Form::open(array(
                          'route' => array( 'visit.destroy', $value->id ),
                          'method' => 'delete',
                          'style' => 'display:inline',
                          'onsubmit' => "return confirm('Are you sure you want to delete?')",
                      ))); ?>

                           <?php echo e(Form::submit('Delete', array('class' => 'btn btn-danger'))); ?>

                      <?php echo e(Form::close()); ?>

                    </td>
            			</tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            		</tbody>
          		</table>
            </div>
            </div>
            <div class="form-group text-center">
              <?php echo e($visits->links()); ?>

            </div>
          </div>
        </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>