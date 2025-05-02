
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header bg-success text-white">
            TimeTable
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm" id="printTable">
                    <thead>
                        <tr >

                            <th>Employee Name</th>
                            <th>Employee Position</th>
                            <th>Employee ID</th>
                            <?php
                                $today = today();
                                $dates = [];
                                
                                for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                                    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                }
                                
                            ?>
                            <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th style="">
                            
                                
                                    <?php echo e($date); ?>

                            
                        </th>
                      

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tr>
                    </thead>

                    <tbody>





                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <input type="hidden" name="emp_id" value="<?php echo e($employee->id); ?>">

                            <tr>
                                <td><?php echo e($employee->name); ?></td>
                                <td><?php echo e($employee->position); ?></td>
                                <td><?php echo e($employee->id); ?></td>






                                <?php for($i = 1; $i < $today->daysInMonth + 1; ++$i): ?>


                                    <?php
                                        
                                        $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                        
                                        $check_attd = \App\Models\Attendance::query()
                                            ->where('emp_id', $employee->id)
                                            ->where('attendance_date', $date_picker)
                                            ->first();
                                        
                                        $check_leave = \App\Models\Leave::query()
                                            ->where('emp_id', $employee->id)
                                            ->where('leave_date', $date_picker)
                                            ->first();
                                        
                                    ?>
                                    <td>

                                        <div class="form-check form-check-inline ">

                                            <?php if(isset($check_attd)): ?>
                                                 <?php if($check_attd->status==1): ?>
                                                 <i class="fa fa-check text-success"></i>
                                                 <?php else: ?>
                                                 <i class="fa fa-check text-danger"></i>
                                                 <?php endif; ?>
                                               
                                            <?php else: ?>
                                            <i class="fas fa-times text-danger"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          
                                            <?php if(isset($check_leave)): ?>
                                            <?php if($check_leave->status==1): ?>
                                            <i class="fa fa-check text-success"></i>
                                            <?php else: ?>
                                            <i class="fa fa-check text-danger"></i>
                                            <?php endif; ?>
                                          
                                       <?php else: ?>
                                       <i class="fas fa-times text-danger"></i>
                                       <?php endif; ?>
                                        

                                        </div>

                                    </td>

                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                    </tbody>


                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\.My Projects\Databse\Attendance_Management_System\resources\views/admin/sheet-report.blade.php ENDPATH**/ ?>