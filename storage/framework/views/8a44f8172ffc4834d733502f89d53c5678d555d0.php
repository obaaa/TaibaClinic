<link rel="stylesheet" href="<?php echo e(asset('css/report.css')); ?>" />
<header class="clearfix">


		<h1>FUTUR Dental Clinic</h1>
		<div style="margin: auto; display: block; " >
      <img style="margin: auto; display: block;" height="100px" width="250px" src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>">
		</div>

	<h1>Catch Receipt <?php echo e(date("Y-m-d")); ?></h1>
</header>
<main>
	<?php $work_time = App\Work_time::find($visit->work_time_id); ?>
	<h2 style="color:#999; font-size:70px;float: right; overflow: right;">Copy</h2>
	<h2>Patient: <?php echo e(App\Patient::find($visit->patient_id)->patient_name); ?> </h2> <b>Visit:</b> <?php echo e(App\Day::find($work_time->day_id)->day_name); ?> , <?php echo e($visit->visit_date); ?> , <?php echo e(App\Divisions_time::find($visit->divisions_time_id)->time); ?><br>
  ------------------------------------------------------------------------------------------------
	<h2>Visit Cost :      <?php echo e($visit->visit_price); ?></td>
	<h2>Visit Obtained :  <?php echo e($visit->visit_paid); ?></h2>
	<?php if ($visit->discount != 0): ?>
		<h2>Visit discount :  <?php echo e($visit->discount); ?>%</h2>
	<?php endif; ?>
	<h2>Visit Remained :  <?php echo e($visit->visit_price - $visit->visit_paid); ?></h2>
	<p>Employee name :  <?php echo e(Auth::user()->name); ?></p>
</main>

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<p style="float: right;">أم درمان شارع الوادي - حي الروضة | ت: 0155194740 - موبايل: 0960600003</p>
<p style="float: left;">[ By: Taiba Clinics | www.obaaa.sd ]</p>
<br><br><br><br>
<h1></h1>
<header class="clearfix">


		<h1>FUTUR Dental Clinic</h1>
		<div style="margin: auto; display: block; " >
      <img style="margin: auto; display: block;" height="100px" width="250px" src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>">
		</div>



		<h1>Catch Receipt <?php echo e(date("Y-m-d")); ?></h1>
	</header>
	<main>
		<?php $work_time = App\Work_time::find($visit->work_time_id); ?>
		<h2>Patient: <?php echo e(App\Patient::find($visit->patient_id)->patient_name); ?> </h2> <b>Visit:</b> <?php echo e(App\Day::find($work_time->day_id)->day_name); ?> , <?php echo e($visit->visit_date); ?> , <?php echo e(App\Divisions_time::find($visit->divisions_time_id)->time); ?><br>
	  ------------------------------------------------------------------------------------------------
		<h2>Visit Cost :      <?php echo e($visit->visit_price); ?></td>
		<h2>Visit Obtained :  <?php echo e($visit->visit_paid); ?></h2>
		<?php if ($visit->discount != 0): ?>
			<h2>Visit discount :  <?php echo e($visit->discount); ?>%</h2>
		<?php endif; ?>
		<h2>Visit Remained :  <?php echo e($visit->visit_price - $visit->visit_paid); ?></h2>
		<p>Employee name :  <?php echo e(Auth::user()->name); ?></p>
	</main>

	-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	<p style="float: right;">أم درمان شارع الوادي - حي الروضة | ت: 0155194740 - موبايل: 0960600003</p>
	<p style="float: left;">[ By: Taiba Clinics | www.obaaa.sd ]</p>
