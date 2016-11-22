<link rel="stylesheet" href="<?php echo e(asset("css/report.css")); ?>" />
<header class="clearfix">
      <div id="logo">
         <h1>Taiba-Clinic</h1>
        <!-- <img src="<?php echo e(asset("assets/img/3.png")); ?>"> -->
      </div>

      <h1>medical report</h1>
    <main>
      <p> patient: <?php echo e($patient->patient_name); ?></p>
      <p> doctor: <?php echo e(App\User::find($visit->doctor_id)->name); ?> </p>
      <p> date: <?php echo e($visit->visit_date); ?> </p>
      <div style="margin: auto; margin-right: auto;">
        <blockquote><pre><?php echo html_entity_decode($visit->medical_report); ?></pre></blockquote>
      </div>
    <div id="notices">
        <div>repotr:</div>
        <div class="notice"> .</div>
      </div>
    </main>
    <footer>
      xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[obaaa.sd]xxxx
    </footer>
