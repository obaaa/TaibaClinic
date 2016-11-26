<?php $__env->startSection('titel','Work Time'); ?>
<?php $__env->startSection('content'); ?>
<!--overview start-->

    <!--overview end -->

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">categorie</div>
        <div class="panel-body">

        <!-- start form -->
        <form action="<?php echo e(url ('categorie')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
      	<fieldset>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

      	<!-- input categorie_name-->
      	<div class="form-group">
      	  <label class="col-md-4 control-label" for="categorie_name">اﻹسم</label>
      	  <div class="col-md-5">
      	  <input id="categorie_name" name="categorie_name" placeholder="name" class="form-control input-md" required="" type="text">
      	  </div>
      	</div>

      	<!-- Button -->
      	<div class="form-group">
        		<label class="col-md-4 control-label" for="submit"></label>
        		<div class="col-md-5">
          		<button id="submit" name="submit" class="btn btn-primary">حفظ</button>
        		</div>
      	</div>
      	</fieldset>
      	</form>
        <!-- End form-->

        <legend> </legend>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>اﻹسم</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($categorie->categorie_name); ?></td>
                <td>
                  <?php echo e(Form::open(array(
                      'route' => array( 'categorie.destroy', $categorie->id ),
                      'method' => 'delete',
                      'style' => 'display:inline',
                      'onsubmit' => "return confirm('Do you really want to delete the categorie?')",
                  ))); ?>

                       <?php echo e(Form::submit('Delete', array('class' => 'btn btn-danger'))); ?>

                  <?php echo e(Form::close()); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
  </div></div></div></div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>