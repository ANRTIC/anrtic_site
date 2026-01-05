<header id="page-header"
    class="fixed top-0 right-0 left-0 z-30 flex h-16 flex-none items-center bg-white/90 backdrop-blur-xs lg:hidden lg:pl-64 dark:bg-gray-900/90">
    <div class="container mx-auto flex w-full justify-between px-4 lg:px-8 xl:max-w-7xl">
        <div class="flex flex-none items-center gap-4">
            <!-- Toggle Sidebar -->
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
        <div class="flex grow items-center justify-center lg:hidden">
            <a href="{{ route("backoffice.backoffice") }}"
                class="group inline-flex items-center gap-2 font-bold tracking-wide text-gray-900 hover:text-gray-600 dark:text-gray-100 dark:hover:text-gray-300"
                wire:navigate>
                <img src="{{ asset("logo/anrtic.png") }}" class="inline-block w-30 h-auto"/>
            </a>
        </div>

        <!-- Settings -->
        <div class="flex flex-none items-center gap-2">
            <button type="button"
                class="group relative inline-flex w-full items-center gap-2 rounded-lg p-1.5 text-sm leading-5 text-gray-800 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white">
                <span
                    class="absolute inset-0 scale-50 rounded-lg bg-gray-100 opacity-0 transition ease-out group-hover:scale-100 group-hover:opacity-100 group-active:scale-105 group-active:bg-gray-200 dark:bg-gray-700/50 dark:group-active:bg-gray-700/75"></span>
                <span class="relative inline-block">
                    <span class="absolute top-0 right-0 -mt-1 -mr-1 size-3 rounded-full border border-white bg-emerald-500"></span>
                    @if (Auth::user()->photo)
                        <img src="{{ Auth::user()->photoURL() }}"
                            alt="{{ Auth::user()->last_name . ' ' . Auth::user()->first_name }}"
                            class="inline-block size-6 rounded-lg" />
                    @else
                        <img src="{{ asset('logo/anonymous.jpg') }}"
                            class="inline-block size-6 rounded-lg" />
                    @endif
                </span>
            </button>
        </div>
    </div>
</header>
