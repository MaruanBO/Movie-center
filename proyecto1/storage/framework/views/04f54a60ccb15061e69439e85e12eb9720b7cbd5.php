<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <?php if(auth()->guard('admin')->check()): ?>
                            <li class="nav-item <?php echo e(Request::is('catalog/admin') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('/catalog/admin/create')); ?>">
                                    <span>&#10010</span> Nueva película
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('catalog') && ! Request::is('catalog/admin/create')? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('/catalog/admin/')); ?>">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                Catálogo
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->guard('blogger')->check()): ?>
                            <li class="nav-item <?php echo e(Request::is('catalog/blogger')? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('/catalog/blogger/')); ?>">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                Catálogo
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Hi There <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            <?php echo $__env->make('message.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html><?php /**PATH /home/vagrant/code/proyecto1/resources/views/layouts/auth.blade.php ENDPATH**/ ?>