
<?php $__env->startSection('content'); ?>
     <div id="Background"
            class="absolute top-0 w-full h-[280px] rounded-bl-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
        </div>
     <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
            <div class="flex flex-col gap-1">
                <p>Selamat datang 👋</p>
                <h1 class="font-bold text-xl leading-[30px]"> Temukan Kos Nyaman di Kota Impianmu</h1>
            </div>
            <a href="#"
                class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
                <img src="assets/images/icons/notification.svg" class="w-[28px] h-[28px]" alt="icon">
            </a>
        </div>
      <div id="Categories" class="swiper w-full overflow-x-hidden mt-[30px]">
            <div class="swiper-wrapper">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                  <div class="swiper-slide !w-fit pb-[30px]">
                    <a href="<?php echo e(route('category.show', $category->slug)); ?>" class="card">
                        <div
                            class="flex flex-col items-center w-[120px] shrink-0 rounded-[40px] p-4 pb-5 gap-3 bg-white shadow-[0px_12px_30px_0px_#0000000D] text-center">
                            <div class="w-[70px] h-[70px] rounded-full flex shrink-0 overflow-hidden">
                                <img src="<?php echo e(asset('storage/' . $category->image)); ?>

" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <h3 class="font-semibold"><?php echo e($category->name); ?></h3>
                                <p class="text-sm text-ngekos-grey"><?php echo e($category->boardingHouses->count()); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                
            </div>
        </div>
        <section id="Popular" class="flex flex-col gap-4">
    <div class="flex items-center justify-between px-5">
        <h2 class="font-bold">Popular Kos</h2>
        <a href="#">
            <div class="flex items-center gap-2">
                <span>See all</span>
                <img src="assets/images/icons/arrow-right.svg"
                     class="w-6 h-6 flex shrink-0"
                     alt="icon">
            </div>
        </a>
    </div>

    <div class="swiper w-full overflow-x-hidden">
        <div class="swiper-wrapper">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $popularBoardingHouse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boardingHouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
             <div class="swiper-slide !w-fit">
                <a href="<?php echo e(route('kos.show', $boardingHouse->slug)); ?>" class="card">
                    <div class="flex flex-col w-[250px] shrink-0 rounded-[30px] border border-[#F1F2F6] p-4 pb-5 gap-[10px] hover:border-[#91BF77] transition-all duration-300">
                        
                        <div class="flex w-full h-[150px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $boardingHouse->thumbnail)); ?>"
                                 class="w-full h-full object-cover"
                                 alt="thumbnail">
                        </div>

                        <div class="flex flex-col gap-3">
                            <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                                <?php echo e($boardingHouse->name); ?>

                            </h3>

                            <hr class="border-[#F1F2F6]">

                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/location.svg"
                                     class="w-5 h-5 flex shrink-0"
                                     alt="icon">
                                <p class="text-sm text-ngekos-grey"><?php echo e($boardingHouse->city->name); ?></p>
                            </div>

                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/3dcube.svg"
                                     class="w-5 h-5 flex shrink-0"
                                     alt="icon">
                                <p class="text-sm text-ngekos-grey"><?php echo e($boardingHouse->category->name); ?></p>
                            </div>

                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/profile-2user.svg"
                                     class="w-5 h-5 flex shrink-0"
                                     alt="icon">
                                <p class="text-sm text-ngekos-grey"><?php echo e($boardingHouse->max_guest); ?> People</p>
                            </div>

                            <hr class="border-[#F1F2F6]">

                            <p class="font-semibold text-lg text-ngekos-orange">Rp.
                                <?php echo e(number_format($boardingHouse->price, 0, ',', '.')); ?>

                                <span class="text-sm text-ngekos-grey font-normal">/bulan</span>
                            </p>
                        </div>

                    </div>

                </a>
            </div>
           <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
</section>

<section id="Cities" class="flex flex-col p-5 gap-4 bg-[#F5F6F8] mt-[30px]">
            <div class="flex items-center justify-between">
                <h2 class="font-bold">Browse Cities</h2>
                <a href="#">
                    <div class="flex items-center gap-2">
                        <span>See all</span>
                        <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    </div>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                     <a href="<?php echo e(route('city.show', $city->slug)); ?>" class="card">
                    <div
                        class="flex items-center rounded-[22px] p-[10px] gap-3 bg-white border border-white overflow-hidden hover:border-[#91BF77] transition-all duration-300">
                        <div
                            class="w-[55px] h-[55px] flex shrink-0 rounded-full border-4 border-white ring-1 ring-[#F1F2F6] overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $city->image)); ?>" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[2px]">
                            <h3 class="font-semibold"><?php echo e($city->name); ?></h3>
                            <p class="text-sm text-ngekos-grey"><?php echo e($city->boardingHouses->count()); ?></p>
                        </div>
                    </div>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                
                
                    </div>
            
            
        </section>
 <section id="Best" class="flex flex-col gap-4 px-5 mt-[30px]">
            <div class="flex items-center justify-between">
                <h2 class="font-bold">All Great Koskos</h2>
                <a href="#">
                    <div class="flex items-center gap-2">
                        <span>See all</span>
                        <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    </div>
                </a>
            </div>
            <div class="flex flex-col gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $boardingHouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boardingHouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                   <a href="<?php echo e(route('kos.show', $boardingHouse->slug)); ?>" class="card">
                    <div
                        class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">
                        <div class="flex w-[120px] h-[183px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                                                        <img src="<?php echo e(asset('storage/' . $boardingHouse->thumbnail)); ?>"
 class="w-full h-full object-cover" alt="icon">
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                                <?php echo e($boardingHouse->name); ?></h3>
                            <hr class="border-[#F1F2F6]">
                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/location.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey"><?php echo e($boardingHouse->city->name); ?></p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0"
                                    alt="icon">
                                <p class="text-sm text-ngekos-grey">4 People</p>
                            </div>
                            <hr class="border-[#F1F2F6]">
                            <p class="font-semibold text-lg text-ngekos-orange">Rp.<?php echo e(number_format($boardingHouse->price, 0, ',', '.')); ?><span
                                    class="text-sm text-ngekos-grey font-normal">/bulan</span></p>
                        </div>
                    </div>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
  
            </div>
        </section>

        <?php echo $__env->make('includes.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\MSI\ngekost\resources\views/pages/home.blade.php ENDPATH**/ ?>