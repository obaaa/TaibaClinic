<?php $__env->startSection('titel','checkeds'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">checked</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="<?php echo e(URL::to('checkeds/create')); ?>">New checked</a>
				<hr />
<?php if(Session::has('message')): ?>
	<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No</td>
            <td>name</td>
            <td>price</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
			<?php $i = 1; ?>
    <?php $__currentLoopData = $checkeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<?php if ($value->id != 1): ?>
			<tr>
					<td><?php echo e($i); ?></td>
					<td><?php echo e($value->checked_name); ?></td>
					<td><?php echo e($value->checked_price); ?></td>
					<td>

							<a class="btn btn-small btn-info" href="<?php echo e(URL::to('checkeds/' . $value->id . '/edit')); ?>">Edit</a>
							<?php echo Form::open(array('url' => 'checkeds/' . $value->id, 'class' => 'pull-right')); ?>

									<?php echo Form::hidden('_method', 'DELETE'); ?>

									<?php echo Form::submit(trans('Delete'), array('class' => 'btn btn-warning')); ?>

							<?php echo Form::close(); ?>

					</td>
			</tr><?php $i++; ?>
		<?php endif; ?>
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