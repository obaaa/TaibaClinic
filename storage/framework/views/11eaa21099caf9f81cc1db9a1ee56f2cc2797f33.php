<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(config('app.name', 'Laravel')); ?> | <?php echo $__env->yieldContent('titel'); ?> </title>

 
 <script src="<?php echo asset('/assets/tinymce/tinymce.min.js'); ?>"></script>
 <script src="<?php echo asset('/assets/tinymce/jquery.tinymce.min.js'); ?>"></script>
 <script src="<?php echo asset('/assets/tinymce/themes/modern/theme.min.js'); ?>"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<!-- <script src="<?php echo asset('/assets/dist/css/summernote.css'); ?>"></script> -->
 <!-- <script src="<?php echo asset('/assets/js/summernote.min.js'); ?>"></script> -->

  <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />



<link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>">


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo e(URL::asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo e(URL::asset('assets/css/animate.min.css')); ?>" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo e(URL::asset('assets/css/paper-dashboard.css')); ?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo e(URL::asset('assets/css/demo.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('/css/filter.css')); ?>" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="<?php echo e(URL::asset('assets/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/css.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/themify-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/css/edit.less')); ?>" rel="stylesheet">

</head>
<body>
  <div class="wrapper">
      <div class="sidebar" data-background-color="white" data-active-color="danger">

      <!--
      Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
      Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
              <div class="logo">
                  <a href="<?php echo e(URL::to('/home')); ?>" class="simple-text">
                  <img style="margin: auto; display: block;" height="70px" width="200px" src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>">
                  </a>
              </div>
              <ul class="nav">
                  <li  class="<?php echo e(Request::is('home') ? 'active' : ''); ?>" >
                      <a href="<?php echo e(URL::to('/home')); ?>">
                          <i class="ti-panel"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="<?php echo e(Request::is('visit') ? 'active' : ''); ?>">
                      <a href="<?php echo e(URL::to('/visit')); ?>">
                          <i class="fa fa-calendar"></i>
                          <p>visits</p>
                      </a>
                  </li>
                  <li class="<?php echo e(Request::is('patient*') ? 'active' : ''); ?>" >
                    <a href="<?php echo e(URL::to('/patient')); ?>">
                        <i class="ti-user"></i>
                        <p>Patient</p>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('lab') ? 'active' : ''); ?>">
                      <a href="<?php echo e(URL::to('/lab')); ?>">
                          <i class="ti-timer"></i>
                          <p>Lab</p>
                      </a>
                  </li>
                  <li class="<?php echo e(Request::is('expense') ? 'active' : ''); ?>">
                      <a href="<?php echo e(URL::to('/expense')); ?>">
                          <i class="ti-wallet"></i>
                          <p>Expense</p>
                      </a>
                  </li>
                  <?php $user_id = Auth::user()->id;
                  $role = App\UserRole::where('user_id','=',$user_id)->first();
                  if ($user_id == 1) { ?>
                  <li class="<?php echo e(Request::is('report') ? 'active' : ''); ?>">
                      <a href="<?php echo e(URL::to('/report')); ?>">
                          <i class="ti-bar-chart-alt"></i>
                          <p>report</p>
                      </a>
                  </li>
                  <?php } ?>
          <li class="active-pro">
                      <a href="HTTP://obaaa.sd" target="_blank">
                          <img style="margin: auto; display: block;" height="90px" width="55px" src="<?php echo e(asset('assets/img/taiba.png')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>">
                      </a>
                  </li>
              </ul>
        </div>
      </div>
      <div class="main-panel">
          <nav class="navbar navbar-default">
              <div class="container-fluid">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar bar1"></span>
                          <span class="icon-bar bar2"></span>
                          <span class="icon-bar bar3"></span>
                      </button>
                      <a class="navbar-brand" href="#"><?php echo $__env->yieldContent('titel'); ?></a>
                  </div>
                  <div class="collapse navbar-collapse">
  									<!-- Right Side Of Navbar -->
  									<ul class="nav navbar-nav navbar-right">
  											<!-- Authentication Links -->
  													<li class="dropdown">
  															<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
  																	<?php echo e(Auth::user()->name); ?> <span class="caret"></span>
  															</a>

  															<ul class="dropdown-menu" role="menu">
                                  <?php $user_id = Auth::user()->id;
                                  $role = App\UserRole::where('user_id','=',$user_id)->first();
                                  if ($user_id == 1) { ?>
  																	<li>
  																			<a target="_blank" href="<?php echo e(url('/settings')); ?>">settings</a>
  																	</li>
                                  <?php } ?>
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
  															</ul>
  													</li>
  									</ul>
                    </div>
              </div>
          </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <footer class="footer">
        <div class="container-fluid">
            
            <div class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.obaaa.sd" target="_blank">obaaa</a>
            </div>
        </div>
    </footer>

  </div>
  </div>


  </body>
  <!--   Core JS Files   -->
  <script src="<?php echo e(URL::asset('assets/js/jquery-1.10.2.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>

  <!--  Checkbox, Radio & Switch Plugins -->
  <!-- <script src="<?php echo e(URL::asset('assets/js/bootstrap-checkbox-radio.js')); ?>"></script> -->

  <!--  Charts Plugin -->
  <script src="<?php echo e(URL::asset('assets/js/chartist.min.js')); ?>"></script>

  <!--  Notifications Plugin    -->
  <script src="<?php echo e(URL::asset('assets/js/bootstrap-notify.js')); ?>"></script>

  <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
  <script src="<?php echo e(URL::asset('assets/js/paper-dashboard.js')); ?>"></script>

  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo e(URL::asset('assets/js/demo.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/edit.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('js/filter.js')); ?>"></script>



      
  <script type="text/javascript">
      $(document).ready(function() {
          $('#summernote').summernote({
            height:300,
          });
      });
  </script>
  </html>
