<?php $__env->startSection('content'); ?>
<?php $__env->startSection('titel','expenses'); ?>
<div class="container">
    <div class="row">
      <div class="col-md-11 col-md-12">
          <div class="card">
            <div class="content">
<form action="<?php echo e(url ('expense')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <?php echo csrf_field(); ?>

    <!-- Form Name -->
    <div class="row">
    <div class="col-md-3">
        <div class="form-group">
          <label>Name</label>
          <input id="expense_name" name="expense_name" placeholder="name" class="form-control border-input" required="" type="text">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
          <label>Category</label>
            <input list="expense_category" name="expense_category" class="form-control border-input">
            <datalist id="expense_category">
              <option value="Daily">
              <option value="Governmental">
              <option value="Other">
            </datalist>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label class=" control-label" for="expense_price">Price</label>
          <input id="expense_price" name="expense_price" placeholder="SDG" class="form-control border-input" required="" type="text">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
          <label class=" control-label" for="expense_description">description</label>
          <input id="expense_description" name="expense_description" placeholder="description" class="form-control border-input" type="text">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
          <label class=" control-label" for="expense_date">التاريخ</label>
          <input id="expense_date" name="expense_date" placeholder="date" class="form-control border-input" required="true" type="date">
        </div>
    </div></div>
    <!-- Button -->
    <div class="text-center">
        <?php echo e(Form::submit('go',array('class' => 'btn btn-info btn-fill btn-wd'))); ?>

    </div>
    <div class="clearfix"></div>
    </form>
  </div></div>
  <!-- End form-->
<table class="table table-bordered">
        <thead>
            <tr>
                <th>name</th>
                <th>category</th>
                <th>price</th>
                <th>description</th>
                <th>date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e($expense->expense_name); ?></td>
                <td><?php echo e($expense->expense_category); ?></td>
                <td><?php echo e($expense->expense_price); ?></td>
                <td><?php echo e($expense->expense_description); ?></td>
                <td><?php echo e($expense->expense_date); ?></td>
                <td>
                    <a class="btn btn-small btn-info" href="<?php echo e(URL::to('expense/' . $expense->id . '/edit')); ?>">Edit</a>
                    <?php echo e(Form::open(array('url' => 'expense/' . $expense->id, 'class' => 'pull-right','method' => 'delete','style' => 'display:inline','onsubmit' => "return confirm('Are you sure you want to delete?')",))); ?>

                    	<?php echo e(Form::hidden('_method', 'DELETE')); ?>

                    	<?php echo e(Form::submit('Delete', array('class' => 'btn btn-warning'))); ?>

                    <?php echo e(Form::close()); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
 </table>
 <div class="form-group text-center">
   <?php echo e($expenses->links()); ?>

 </div></div></div></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>