<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('maiContent'); ?>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 text-success"><?php echo e(Session::get('message')); ?></h1>
    <h1 class="mt-4 mb-3"><?php echo e($blogs->blog_title); ?></h1>
    <hr>
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="<?php echo e(asset($blogs->blog_image)); ?>" alt="<?php echo e($blogs->blog_title); ?>">
            <hr>
            <!-- Date/Time -->
            <p style="padding-left: 10px;"> <?php echo e($blogs->date); ?></p>
            <hr>
            <!-- Post Content -->
            <p class="lead"><?php echo $blogs->blog_long_description; ?></p>
            <hr>
            <?php if($visitor_id = Session::get('visitor_id')): ?>
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Comment:</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('new-comment')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="visitor_id" value="<?php echo e($visitor_id); ?>">
                        <input type="hidden" name="blog_id" value="<?php echo e($blogs->id); ?>">
                        <input type="hidden" name="blog_title" value="<?php echo e($blogs->blog_title); ?>">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <?php else: ?>
            <div class="card my-4">
                <div class="card-body">
                    <h5 class="card-title">You have to <a href="<?php echo e(route('visitor-login')); ?>">login</a> to Comment this blog. If you are <a href="<?php echo e(route('singUp')); ?>">registration</a> then <a href="<?php echo e(route('visitor-login')); ?>">login</a></h5>
                </div>
            </div>
            <?php endif; ?>
            <!-- Single Comment -->
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo e($comment->first_name.' '.$comment->last_name); ?></h5>
                    <p style="background: #ddd; padding: 10px;"><?php echo e($comment->comment); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Search Widget -->
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('category-blog',['id'=>$category->id,'name'=>$category->category_name])); ?>"><?php echo e($category->category_name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>