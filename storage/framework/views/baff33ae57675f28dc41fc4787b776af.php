<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Information
        </div>
        <div class="card-body">
                <div class="col-md-0">
                    <div class="form-group mt-8">
                        <label for="id">Reporting ID</label>
                        <input class="form-control" type="text" name="reporting_id" readonly>
                    </div>

                    <div class="form-group mt-2">
                        <label for="type">Status</label>
                        <select class="form-control" id="type" name="type">
                            <option value="" disabled selected>Please Select</option>
                            <option value="Air Conditioning">Not Process Yet</option>
                            <option value="Furniture">In Progress</option>
                            <option value="Internet">Done</option>
                        </select>
                        <?php $__errorArgs = ['status'];
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
                    <label for="description">Remark</label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="Remark" rows="3"><?php echo e(old('remark')); ?></textarea>
                    <?php $__errorArgs = ['remark'];
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
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                    <form action="<?php echo e(route('technician.reportDetail')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- Your form fields -->
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit</button>
                    </form>
            </div>
        </div>



        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fypproject\resources\views/technician/reportStatus.blade.php ENDPATH**/ ?>