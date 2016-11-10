<?php $__env->startSection('titel','employees'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">employees</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="<?php echo e(URL::to('employees/create')); ?>">New Employee</a>
				<hr />
<?php if(Session::has('message')): ?>
	<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo e($value->id); ?></td>
            <td><?php echo e($value->name); ?></td>
            <td><?php echo e($value->email); ?></td>
            <td>

                <a class="btn btn-small btn-info" href="<?php echo e(URL::to('employees/' . $value->id . '/edit')); ?>">Edit</a>
                <?php echo Form::open(array('url' => 'employees/' . $value->id, 'class' => 'pull-right')); ?>

                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                    <?php echo Form::submit(trans('Delete'), array('class' => 'btn btn-warning')); ?>

                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>