<?php $__env->startSection('content'); ?>
<div class="container-fluid" style="margin-left:-70px; margin-right: -15px ">
    <div class="row">
        <img src="<?php echo e(asset('images/land1.jpg')); ?>" alt="landing_page" class="img img-responsive" style="max-width:100%; height:auto;">
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>