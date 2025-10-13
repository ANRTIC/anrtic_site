<header id="page-header"
    class="fixed top-0 right-0 left-0 z-30 flex h-16 flex-none items-center bg-white/90 backdrop-blur-xs lg:hidden lg:pl-64 dark:bg-gray-900/90">
    <div class="container mx-auto flex w-full justify-between px-4 lg:px-8 xl:max-w-7xl">
        <!-- Left Section -->
        <div class="flex flex-none items-center gap-4">
            <!-- Toggle Sidebar on Mobile -->
            <button x-on:click="mobileSidebarOpen = !mobileSidebarOpen" type="button"
                class="group relative inline-flex w-full items-center gap-2 rounded-lg p-2 text-sm leading-5 text-gray-800 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white">
                <span
                    class="absolute inset-0 scale-50 rounded-lg bg-gray-100 opacity-0 transition ease-out group-hover:scale-100 group-hover:opacity-100 group-active:scale-105 group-active:bg-gray-200 dark:bg-gray-700/50 dark:group-active:bg-gray-700/75"></span>
                <svg class="hi-solid hi-menu-alt-1 relative inline-block size-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <!-- END Toggle Sidebar on Mobile -->
        </div>
        <!-- END Left Section -->

        <!-- Center Section -->
        <div class="flex grow items-center justify-center lg:hidden">
            <a href="javascript:void(0)"
                class="group inline-flex items-center gap-2 font-bold tracking-wide text-gray-900 hover:text-gray-600 dark:text-gray-100 dark:hover:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 73 49" class="size-6">
                    <path fill="#38bdf8"
                        d="M46.868 24c0 12.426-10.074 22.5-22.5 22.5-12.427 0-22.5-10.074-22.5-22.5S11.94 1.5 24.368 1.5c12.426 0 22.5 10.074 22.5 22.5Z" />
                    <path fill="#a855f7"
                        d="M71.132 24c0 12.426-9.975 22.5-22.28 22.5-12.304 0-22.278-10.074-22.278-22.5S36.547 1.5 48.852 1.5c12.304 0 22.28 10.074 22.28 22.5Z" />
                    <path fill="#6b21a8"
                        d="M36.67 42.842C42.81 38.824 46.868 31.886 46.868 24c0-7.886-4.057-14.824-10.198-18.841A22.537 22.537 0 0 0 26.573 24 22.537 22.537 0 0 0 36.67 42.842Z" />
                </svg>
                <span>Circles AI</span>
            </a>
        </div>
        <!-- END Center Section -->

        <!-- Right Section -->
        <div class="flex flex-none items-center gap-2">
            <!-- Settings -->
            <button type="button"
                class="group relative inline-flex w-full items-center gap-2 rounded-lg p-1.5 text-sm leading-5 text-gray-800 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white">
                <span
                    class="absolute inset-0 scale-50 rounded-lg bg-gray-100 opacity-0 transition ease-out group-hover:scale-100 group-hover:opacity-100 group-active:scale-105 group-active:bg-gray-200 dark:bg-gray-700/50 dark:group-active:bg-gray-700/75"></span>
                <span class="relative inline-block">
                    <span
                        class="absolute top-0 right-0 -mt-1 -mr-1 size-3 rounded-full border border-white bg-emerald-500"></span>
                    <img src="https://cdn.tailkit.com/media/placeholders/avatar-bY4GXQKfZrA-160x160.jpg"
                        alt="User Avatar" class="inline-block size-6 rounded-lg" />
                </span>
            </button>
            <!-- END Settings -->
        </div>
        <!-- END Right Section -->
    </div>
</header>
