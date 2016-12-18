  
  <?php $__env->startSection('content'); ?>
  <?php $__env->startSection('titel','lab'); ?>
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
                <h4 class="title">Lab</h4>
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
                      <th class="type text_align_center"><b>Type</b></th>
                      <th class="description text_align_center"><b>Description</b></th>
                      <th class="status text_align_center"><b>Status</b></th>
                      <th class="text_align_center"><b></b></th>
                      <th class="text_align_center"><b>delete</b></th>
            				</tr>
            			</thead>
            			<tbody>
                  
                  <?php $__currentLoopData = $labs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            			<tr>
                    <td class="name">
                      <?php $visit = App\Visit::find($value->visit_id); ?>
                      <a href="<?php echo e(url ('visit/'.$visit->id)); ?>" class="" ><?php echo e(App\Patient::find($visit->patient_id)->patient_name); ?></a>
                    </td>
                    <td class="type"><?php echo e($value->lab_type); ?></td>
                    <td class="description">
                      <pre><?php echo html_entity_decode($value->lab_description); ?></pre>
                    </td>
                    <td class="status"><?php echo e($value->lab_status); ?></td>
                    <td class="">
                      <form method="post" action="<?php echo e(url('lab_update')); ?>">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="lab_id" value="<?php echo e($value->id); ?>" />
                        <select class="form-control" name="lab_status" onchange="this.form.submit();">
                          <option disabled selected value> -- select -- </option>
                          <option value="In wait" >In wait</option>
                          <option value="Completed" >Completed</option>
                          <option value="Finish" >Finish</option>
                        </select>
                      </form>
                    </td>
                    <td class="delete">
                      <?php echo e(Form::open(array(
                          'route' => array( 'lab.destroy', $value->id ),
                          'method' => 'delete',
                          'style' => 'display:inline',
                          'onsubmit' => "return confirm('Do you really?')",
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
              <?php echo e($labs->links()); ?>

            </div>
          </div>
        </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>