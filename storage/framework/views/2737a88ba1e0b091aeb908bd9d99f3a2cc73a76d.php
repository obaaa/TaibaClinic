<link rel="stylesheet" href="<?php echo e(asset("css/report.css")); ?>" />
<header class="clearfix">
  
     
     <img style="margin: auto; display: block;" height="100px" width="250px" src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>">
  

      <h1>REPORT VISIT :   [ <?php echo e($from_date); ?> ] to [ <?php echo e($to_date); ?> ]</h1>
    <main>


      <table class="members_details">
        <thead>
          <tr>
            <th><b>pationt</b></th>
            <th><b>Date</b></th>
            <th><b>Day | Time</b></th>
            <th><b>Doctor</b></th>
            <th><b>Status</b></th>
            <th><b>discount</b></th>
            <th><b>value | pid</b></th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0 ?>
          <?php $total_remaining = 0 ?>
          <?php $total_paid = 0 ?>
            <?php $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
              <td>
                <?php echo e(App\Patient::find($value->patient_id)->patient_name); ?>

              </td>
              <td class="date">
                <?php echo e($value->visit_date); ?>

              </td>
              <td>
                <?php
                  $date_stamp = strtotime(date('Y-m-d', strtotime($value->visit_date)));
                  $stamp = date('l', $date_stamp);
                ?>
                <?php echo e($stamp); ?> | <?php echo e(App\Divisions_time::find($value->divisions_time_id)->time); ?>

              </td>
              </td>
              <td>
                <?php echo e(App\User::find($value->doctor_id)->name); ?>

              </td>
              <td>
                <?php if ($value->visit_price != $value->visit_paid): ?>
                  <b>incomplete</b>
                <?php else: ?>
                  <b>complete</b>
                <?php endif; ?>
              </td>
              <td><?php echo e($value->discount); ?></td>
              <td>
                <?php echo e($value->visit_price); ?> | <?php echo e($value->visit_paid); ?>

                <?php
                $total = $total + $value->visit_price;
                $x = $value->visit_price - $value->visit_paid;
                $total_remaining = $total_remaining + $x;
                $total_paid = $total_paid +$value->visit_paid;
                ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <tr>
              <td colspan="6" class="grand total">TOTAL Remaining</td>
              <td class="grand total"><?php echo e($total_remaining); ?></td>
            </tr>
            <tr>
              <td colspan="6" class="grand total">TOTAL Paid </td>
              <td class="grand total"><?php echo e($total_paid); ?></td>
            </tr>

            <tr>
              <td colspan="6" class="grand total">TOTAL</td>
              <td class="grand total"><?php echo e($total); ?></td>
            </tr>

        </tbody>
      </table>
      <div id="notices"><h1></h1>
        xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[Taiba Center: www.obaaa.sd]xxxx
        <div class="notice"> .</div>
      </div>
    </main>
    <!-- <footer>
      xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx[obaaa.sd]xxxx
    </footer> -->
