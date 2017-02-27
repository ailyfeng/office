<?php $__env->startSection('content'); ?>


<script type="text/javascript">

//保存成功好提示消息，并关闭对话框
$(window).ready(function(){
    var index = parent.layer.getFrameIndex(window.name);
    <?php if($url): ?>
    	parent.layer.msg('<?php echo e($mes); ?>');
    	window.location.href='<?php echo e($url); ?>';
    <?php else: ?>
    	// parent.location.reload();
    	parent.location.replace(parent.location.href);
    	parent.layer.msg('<?php echo e($mes); ?>');
    	parent.layer.close(index);
    <?php endif; ?>
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>