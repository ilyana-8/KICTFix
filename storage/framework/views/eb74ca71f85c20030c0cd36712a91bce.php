<?php $__env->startSection('content'); ?>
<head>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<div class="container">
        <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>
        <div class="col-md-12">
            <?php echo e(session('message')); ?>


    <div class="container-fluid">
    <table class="table">
        <thead>
            <tr class="table-header-row">
                <th style="width: 20%;">Reporting ID</th>
                <th style="width: 20%;">Report Date</th>
                <th style="width: 20%;">Complain Name</th>
                <th style="width: 20%;">Status</th>
                <th style="width: 20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1714762163</td>
                <td>2024-05-03</td>
                <td>Che Ku Harraz</td>
                <td><span style="background-color: red; color: white;">Not Process Yet</span></td>
                <td><a href="<?php echo e(route('technician.reportDetail')); ?>" class="btn btn-primary">View Detail</a></td>
            </tr>
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($report->reporting_id); ?></td>
                <td><?php echo e($report->created_at->format('Y-m-d')); ?></td>
                <td>
                    <?php if($report->status === 'Not Process Yet'): ?>
                    <span style="color: red;"><?php echo e($report->status); ?></span>
                    <?php elseif($report->status === 'In Progress'): ?>
                    <span style="color: green;"><?php echo e($report->status); ?></span>
                    <?php else: ?>
                    <span style="color: darkblue;"><?php echo e($report->status); ?></span>
                    <?php endif; ?>
                </td>
                <td><a href="<?php echo e(route('technician.reportDetail')); ?>" class="btn btn-info">View Detail</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fypproject\resources\views/technician/manageReport.blade.php ENDPATH**/ ?>