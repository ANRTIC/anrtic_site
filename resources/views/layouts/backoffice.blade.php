<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANRTIC | Comores</title>
    
    <!-- Inter + Caveat web fonts from Bunny.net (GDPR compliant) -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
      href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.bunny.net/css2?family=Caveat:wght@600&display=swap"
      rel="stylesheet"
    />
    @vite([
        'resources/css/app.css', 
        'resources/js/app.js'
    ])
</head>
<body>

    <div
        x-data="{ userDropdownOpen: false, mobileSidebarOpen: false, desktopSidebarOpen: true }"
        x-bind:class="{
            'lg:pl-64': desktopSidebarOpen
        }"
        id="page-container"
        class="mx-auto flex min-h-dvh w-full min-w-80 flex-col bg-white lg:pl-64 dark:bg-gray-900 dark:text-gray-100"
    >
        <div
            x-cloak
            x-on:click="mobileSidebarOpen = false"
            x-show="mobileSidebarOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-bind:aria-hidden="!mobileSidebarOpen"
            tabindex="-1"
            class="fixed inset-0 z-40 bg-gray-200/50 p-4 backdrop-blur-xs lg:hidden lg:p-8 dark:bg-gray-800/40"
        ></div>

        <aside
            x-bind:class="{
            '-translate-x-full': !mobileSidebarOpen,
            'translate-x-0 shadow-lg shadow-gray-200 dark:shadow-gray-950/50': mobileSidebarOpen,
            'lg:-translate-x-full': !desktopSidebarOpen,
            'lg:translate-x-0': desktopSidebarOpen,
            }"
            id="page-sidebar"
            class="fixed top-0 bottom-0 left-0 z-50 flex w-64 -translate-x-full flex-col border-r border-gray-200 bg-white transition-transform duration-300 ease-out lg:translate-x-0 lg:shadow-none dark:border-gray-800 dark:bg-gray-900 dark:text-gray-200"
            aria-label="Main Sidebar Navigation"
        >
            @include("components.backoffice_sidebar")
        </aside>

        @include("components.backoffice_header")

        <main
            id="page-content"
            class="flex max-w-full flex-auto flex-col pt-16 lg:pt-0"
        >
            <div class="mx-auto w-full max-w-10xl p-4 lg:p-8">
                @yield("content")
            </div>
        </main>
    </div>
</body>
</html>