<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Form
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('account.submitReport')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="title">Reporter Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="id">Reporting ID</label>
                    <input class="form-control" type="text" name="reporting_id" value="<?php echo e($reportingId); ?>" readonly>
                </div>

                <div class="form-group mt-2">
                    <label for="title">Report Title*</label>
                    <input class="form-control" type="text" name="title" placeholder="Report Title" value="<?php echo e(old('title')); ?>">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger pl-3"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mt-2">
                    <label for="description">Report Description*</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Report Description" rows="3"><?php echo e(old('description')); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger pl-3"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mt-2">
                    <label for="type">Type of Report</label>
                    <select class="form-control" id="type" name="type">
                        <option value="" disabled selected>Please Select</option>
                        <option value="Air Conditioning">Air Conditioning</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Internet">Internet</option>
                        <option value="Toilet(Leakage/Clogged/Others)">Toilet</option>
                        <option value="Teaching Aids">Teaching Aids</option>
                    </select>
                    <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger pl-3"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mt-3">
                    <label for="file">Attachment</label>
                    <input class="form-control-file" type="file" name="file" />
                    <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- succesful message -->
                <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="font-size: 0.9rem;">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <!-- button save -->
                <div class="d-flex justify-content-end mb-3">
                    <input type="hidden" name="reporting_id" value="<?php echo e($reportingId); ?>">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fypproject\resources\views/newReport.blade.php ENDPATH**/ ?>