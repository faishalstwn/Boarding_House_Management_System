
<?php $__env->startSection('content'); ?>
  <div id="Background" class="absolute top-0 w-full h-[430px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>
        <div class="relative flex flex-col gap-[30px] my-[60px] px-5">
            <h1 class="font-bold text-[30px] leading-[45px] text-center">Booking Successful<br>Congratulations!</h1>
            <div id="Header" class="relative flex items-center justify-between gap-2">
                <div class="flex flex-col w-full rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white">
                    <div class="flex gap-4">
                        <div class="flex w-[120px] h-[132px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $transaction->boardingHouse->thumbnail)); ?>" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <p class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]"><?php echo e($transaction->boardingHouse->name); ?></p>
                            <hr class="border-[#F1F2F6]">
                            <div class="flex items-center gap-[6px]">
                                <img src="<?php echo e(asset('assets/images/icons/location.svg')); ?>" class="w-5 h-5 flex shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey">kota <?php echo e($transaction->boardingHouse->city->name); ?></p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey">In <?php echo e($transaction->boardingHouse->category->name); ?></p>
                            </div>
                        </div>
                    </div>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex gap-4">
                        <div class="flex w-[120px] h-[138px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $transaction->room->images->first()->image)); ?>" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <p class="font-semibold text-lg leading-[27px]"><?php echo e($transaction->room->name); ?></p>
                            <hr class="border-[#F1F2F6]">
                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey"><?php echo e($transaction->room->capacity); ?> People</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/3dcube.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey"><?php echo e($transaction->room->square_feet); ?>sqft flat</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/calendar.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey">
                                    <?php echo e(\Carbon\Carbon::parse($transaction->start_date)->isoformat('D MMMM YYYY')); ?>

                                     <?php echo e(\Carbon\Carbon::parse($transaction->start_date)->addMonth($transaction->duration)->isoformat('D MMMM YYYY')); ?>


                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[18px]">
                <p class="font-semibold">Your Booking ID</p>
                <div class="flex items-center rounded-full p-[14px_20px] gap-3 bg-[#F5F6F8]">
                    <img src="assets/images/icons/note-favorite-green.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                    <p class="font-semibold"><?php echo e($transaction->code); ?></p>
                </div>
            </div>
            <div class="flex flex-col gap-[14px]">
                <a href="<?php echo e(route('home')); ?>" class="w-full rounded-full p-[14px_20px] text-center font-bold text-white bg-ngekos-orange">Explore Other Kos</a>
            <form action="<?php echo e(route('check-booking.show')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="code" value="<?php echo e($transaction->code); ?>">
    <input type="hidden" name="email" value="<?php echo e($transaction->email); ?>">
    <input type="hidden" name="phone_number" value="<?php echo e($transaction->phone_number); ?>">

    <button class="w-full rounded-full p-[14px_20px] text-center font-bold text-white bg-ngekos-black">
        View My Booking
    </button>

</form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\ngekost\resources\views/pages/booking/success.blade.php ENDPATH**/ ?>