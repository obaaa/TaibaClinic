<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                    <ul class="nav navbar-nav">
                      

                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo e(url ('product')); ?>">products</a></li>
                          <li><a href="<?php echo e(url ('product/create')); ?>">new product</a></li>
                        </ul>
                      </li>

                      

                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Customer
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo e(url ('customer')); ?>">Customers</a></li>
                          <li><a href="<?php echo e(url ('form')); ?>">add invoice</a></li>
                          <li><a href="<?php echo e(url ('customer/create')); ?>">new customer</a></li>
                        </ul>
                      </li>

                      

                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Supplier
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo e(url ('supplier')); ?>">suppliers</a></li>
                          <li><a href="<?php echo e(url ('add_invoice/create')); ?>">add invoice</a></li>
                          <li><a href="<?php echo e(url ('supplier/create')); ?>">new supplier</a></li>
                        </ul>
                      </li>

                      
                      <li><a href="<?php echo e(url ('expense')); ?>">Expenses</a></li>
                      
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo e(url ('report/product')); ?>">products</a></li>
                          <li><a href="<?php echo e(url ('report/customer')); ?>">customers</a></li>
                          <li><a href="<?php echo e(url ('report/supplier')); ?>">suppliers</a></li>
                          <li><a href="<?php echo e(url ('report/expense')); ?>">expenses</a></li>
                        </ul>
                      </li>
                    </ul>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(url('/setting')); ?>">setting</a>
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
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
