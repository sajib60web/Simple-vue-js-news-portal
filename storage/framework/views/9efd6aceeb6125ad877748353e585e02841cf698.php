<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo e(asset('/')); ?>front-end/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo e(asset('/')); ?>front-end/css/modern-business.css" rel="stylesheet">
    </head>
    <body>
        <?php echo $__env->make('front-end.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('maiContent'); ?>
        <?php echo $__env->make('front-end.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Bootstrap core JavaScript -->
        <script src="<?php echo e(asset('/')); ?>front-end/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo e(asset('/')); ?>front-end/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

