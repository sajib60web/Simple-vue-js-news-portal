<?php $__env->startSection('title', 'Category Blog'); ?>
<?php $__env->startSection('maiContent'); ?>
<!-- Page Content -->
<div class="container">
    <h1 class="my-4">Welcome to Our Blog</h1>
    <div class="row">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="<?php echo e(route('blog-details',['id'=>$blog->id,'name'=>$blog->blog_title])); ?>"><img class="card-img-top" src="<?php echo e(asset($blog->blog_image)); ?>" alt="<?php echo e($blog->blog_title); ?>"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?php echo e(route('blog-details',['id'=>$blog->id,'name'=>$blog->blog_title])); ?>"><?php echo e($blog->blog_title); ?></a>
                    </h4>
                    <p class="card-text"><?php echo e(str_limit($blog->blog_short_description, 60)); ?></p>
                </div>
                <div class="card-footer">
                    <a style="float: right;" href="<?php echo e(route('blog-details',['id'=>$blog->id,'name'=>$blog->blog_title])); ?>" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>