<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>管理员后台</title>

    <link rel="stylesheet" href="<?php echo e(asset('resources/officecms/style/css/ch-ui.admin.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resources/officecms/style/font/css/font-awesome.min.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('resources/officecms/style/js/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('resources/officecms/style/js/ch-ui.admin.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('resources/officecms/layer/layer.js')); ?>"></script>
</head>
<body>
<?php echo $__env->yieldContent("content"); ?>
</body>
</html>