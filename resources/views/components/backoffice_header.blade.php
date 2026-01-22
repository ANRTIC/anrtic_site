<header id="page-header"
    class="fixed top-0 right-0 left-0 z-30 flex h-16 flex-none items-center bg-white/90 backdrop-blur-xs lg:hidden lg:pl-64 dark:bg-gray-900/90">
    <div class="container mx-auto flex w-full justify-between px-4 lg:px-8 xl:max-w-7xl">
        <!-- Toggle -->
        <div class="flex flex-none items-center gap-4">
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
        </div>

        <!-- Logo -->
        <div class="flex grow items-center justify-end lg:hidden">
            <a href="javascript:void(0)"
                class="group inline-flex items-center gap-2 font-bold tracking-wide text-gray-900 hover:text-gray-600 dark:text-gray-100 dark:hover:text-gray-300">
                <img src="{{ asset("logo/anrtic.png") }}" alt="anrtic-logo" width="100" height="100"/>
            </a>
        </div>
    </div>
</header>
