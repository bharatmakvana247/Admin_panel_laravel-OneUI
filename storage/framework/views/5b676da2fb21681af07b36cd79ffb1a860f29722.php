<?php if(session()->get('notify.model') === 'connect'): ?>
    <div class="notify fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
        <div
            x-data="{ show: <?php if(session()->get('notify.model') === 'connect'): ?> true <?php else: ?> false <?php endif; ?> }"
            x-show="show"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="max-w-sm w-full <?php if(config('notify.theme') === 'light'): ?> bg-white <?php else: ?> bg-gray-800 <?php endif; ?> shadow-lg rounded-lg pointer-events-auto border-t-4 <?php if(session()->get('notify.type') === 'success'): ?> border-green-600 <?php endif; ?> <?php if(session()->get('notify.type') === 'error'): ?> border-red-600 <?php endif; ?>"
        >
            <div class="relative rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <?php if(session()->get('notify.type') === 'success'): ?>
                            <div class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-800 p-2 text-white text-sm rounded-full flex-shrink-0">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="wifi w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                        <?php if(session()->get('notify.type') === 'error'): ?>
                            <div class="inline-flex items-center bg-gradient-to-r from-red-600 to-red-800 p-2 text-white text-sm rounded-full flex-shrink-0">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="x w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                        <div class="ml-6 w-0 flex-1">
                            <p class="text-base leading-5 font-medium <?php if(session()->get('notify.type') === 'error'): ?> text-red-600 <?php else: ?> text-green-600 <?php endif; ?>">
                                <?php echo e(session()->get('notify.title')); ?>

                            </p>
                            <p class="mt-1 text-sm leading-5 text-gray-500">
                                <?php echo e(session()->get('notify.message')); ?>

                            </p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button @click="show = false;" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\LaravelPanel\vendor\mckenziearts\laravel-notify\src/../resources/views/notifications/connectify.blade.php ENDPATH**/ ?>