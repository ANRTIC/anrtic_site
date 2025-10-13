@extends('layouts.backoffice')


@section('content')
    <div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
        <!-- Card Header -->
        <div
            class="flex flex-col gap-3 bg-gray-50 px-5 py-4 text-center sm:flex-row sm:items-center sm:justify-between sm:gap-0 sm:text-left dark:bg-gray-700/50">
            <div>
                <nav class="text-sm font-medium dark:text-gray-100">
                    <ol class="flex items-center justify-center sm:justify-start">
                        <li>
                            <a href="javascript:void(0)"
                                class="text-green-600 hover:text-green-400 dark:text-green-400 dark:hover:text-green-300">Gestion</a>
                        </li>
                        <li class="flex items-center px-1 opacity-25">
                            <svg class="hi-mini hi-chevron-right inline-block size-5" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </li>
                        <li>Articles</li>
                    </ol>
                </nav>
                <h2 class="text-2xl font-bold">Tous les articles</h2>
            </div>
            <div
                class="flex items-center justify-center gap-2 rounded-sm px-2 py-3 sm:justify-end sm:bg-transparent sm:px-0">
                <button type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-4 py-2 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                    <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                    </svg>
                    <span>Ajouter un article</span>
                </button>
            </div>
        </div>
        <div class="grow border-b border-gray-100 p-5 dark:border-gray-700">
            <div class="relative">
                <div
                    class="pointer-events-none absolute inset-y-0 left-0 my-px ml-px flex w-10 items-center justify-center rounded-l text-gray-500">
                    <svg class="hi-mini hi-magnifying-glass inline-block size-5" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input
                    class="block w-full rounded-lg border border-gray-200 py-2 pr-3 pl-10 text-sm leading-6 placeholder-gray-400 focus:border-emerald-500 focus:ring-3 focus:ring-emerald-500/50 dark:border-gray-700 dark:bg-gray-900/25 dark:focus:border-emerald-500"
                    type="text" id="search" name="search" placeholder="Search all orders.." />
            </div>
        </div>
        <!-- END Card Header -->

        <!-- Card Body -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:gap-8">
            <!-- Card -->
            <div class="flex flex-col rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                <!-- Card Body -->
                <div class="flex grow flex-col gap-5 p-5">
                    <!-- Placeholder -->
                    <div
                        class="relative flex aspect-4/3 w-full items-center justify-center rounded-lg border border-gray-200 dark:border-gray-700/75">
                        <div
                            class="absolute inset-0 bg-[image:repeating-linear-gradient(315deg,_currentColor_0,_currentColor_1px,_transparent_0,_transparent_50%)] bg-[size:10px_10px] opacity-5">
                        </div>
                    </div>
                    <!-- END Placeholder -->

                    <!-- Content -->
                    <div>
                        <h3 class="font-bold">Monthly Revenue</h3>
                        <p class="mt-1 text-sm/relaxed text-gray-600 dark:text-gray-400">
                            Track your monthly revenue trends with detailed breakdowns by product
                            category and region...
                        </p>
                    </div>
                    <!-- END Content -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="javascript:void(0)"
                            class="group flex grow items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Voir</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-arrow-right inline-block size-4 transition duration-150 ease-out group-hover:translate-x-1 group-active:opacity-50">
                                <path fill-rule="evenodd"
                                    d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="javascript:void(0)"
                            class="group flex flex-none items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="inline-block size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <!-- END Actions -->
                </div>
                <!-- END Card Body -->
            </div>

            <div class="flex flex-col rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                <!-- Card Body -->
                <div class="flex grow flex-col gap-5 p-5">
                    <!-- Placeholder -->
                    <div
                        class="relative flex aspect-4/3 w-full items-center justify-center rounded-lg border border-gray-200 dark:border-gray-700/75">
                        <div
                            class="absolute inset-0 bg-[image:repeating-linear-gradient(315deg,_currentColor_0,_currentColor_1px,_transparent_0,_transparent_50%)] bg-[size:10px_10px] opacity-5">
                        </div>
                    </div>
                    <!-- END Placeholder -->

                    <!-- Content -->
                    <div>
                        <h3 class="font-bold">Monthly Revenue</h3>
                        <p class="mt-1 text-sm/relaxed text-gray-600 dark:text-gray-400">
                            Track your monthly revenue trends with detailed breakdowns by product
                            category and region...
                        </p>
                    </div>
                    <!-- END Content -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="javascript:void(0)"
                            class="group flex grow items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Voir</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-arrow-right inline-block size-4 transition duration-150 ease-out group-hover:translate-x-1 group-active:opacity-50">
                                <path fill-rule="evenodd"
                                    d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="javascript:void(0)"
                            class="group flex flex-none items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="inline-block size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <!-- END Actions -->
                </div>
                <!-- END Card Body -->
            </div>

            <div class="flex flex-col rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                <!-- Card Body -->
                <div class="flex grow flex-col gap-5 p-5">
                    <!-- Placeholder -->
                    <div
                        class="relative flex aspect-4/3 w-full items-center justify-center rounded-lg border border-gray-200 dark:border-gray-700/75">
                        <div
                            class="absolute inset-0 bg-[image:repeating-linear-gradient(315deg,_currentColor_0,_currentColor_1px,_transparent_0,_transparent_50%)] bg-[size:10px_10px] opacity-5">
                        </div>
                    </div>
                    <!-- END Placeholder -->

                    <!-- Content -->
                    <div>
                        <h3 class="font-bold">Monthly Revenue</h3>
                        <p class="mt-1 text-sm/relaxed text-gray-600 dark:text-gray-400">
                            Track your monthly revenue trends with detailed breakdowns by product
                            category and region...
                        </p>
                    </div>
                    <!-- END Content -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="javascript:void(0)"
                            class="group flex grow items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Voir</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-arrow-right inline-block size-4 transition duration-150 ease-out group-hover:translate-x-1 group-active:opacity-50">
                                <path fill-rule="evenodd"
                                    d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="javascript:void(0)"
                            class="group flex flex-none items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="inline-block size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <!-- END Actions -->
                </div>
                <!-- END Card Body -->
            </div>

            <div class="flex flex-col rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                <!-- Card Body -->
                <div class="flex grow flex-col gap-5 p-5">
                    <!-- Placeholder -->
                    <div
                        class="relative flex aspect-4/3 w-full items-center justify-center rounded-lg border border-gray-200 dark:border-gray-700/75">
                        <div
                            class="absolute inset-0 bg-[image:repeating-linear-gradient(315deg,_currentColor_0,_currentColor_1px,_transparent_0,_transparent_50%)] bg-[size:10px_10px] opacity-5">
                        </div>
                    </div>
                    <!-- END Placeholder -->

                    <!-- Content -->
                    <div>
                        <h3 class="font-bold">Monthly Revenue</h3>
                        <p class="mt-1 text-sm/relaxed text-gray-600 dark:text-gray-400">
                            Track your monthly revenue trends with detailed breakdowns by product
                            category and region...
                        </p>
                    </div>
                    <!-- END Content -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="javascript:void(0)"
                            class="group flex grow items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Voir</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-arrow-right inline-block size-4 transition duration-150 ease-out group-hover:translate-x-1 group-active:opacity-50">
                                <path fill-rule="evenodd"
                                    d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="javascript:void(0)"
                            class="group flex flex-none items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="inline-block size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <!-- END Actions -->
                </div>
                <!-- END Card Body -->
            </div>

            <div class="flex flex-col rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                <!-- Card Body -->
                <div class="flex grow flex-col gap-5 p-5">
                    <!-- Placeholder -->
                    <div
                        class="relative flex aspect-4/3 w-full items-center justify-center rounded-lg border border-gray-200 dark:border-gray-700/75">
                        <div
                            class="absolute inset-0 bg-[image:repeating-linear-gradient(315deg,_currentColor_0,_currentColor_1px,_transparent_0,_transparent_50%)] bg-[size:10px_10px] opacity-5">
                        </div>
                    </div>
                    <!-- END Placeholder -->

                    <!-- Content -->
                    <div>
                        <h3 class="font-bold">Monthly Revenue</h3>
                        <p class="mt-1 text-sm/relaxed text-gray-600 dark:text-gray-400">
                            Track your monthly revenue trends with detailed breakdowns by product
                            category and region...
                        </p>
                    </div>
                    <!-- END Content -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="javascript:void(0)"
                            class="group flex grow items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Voir</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-arrow-right inline-block size-4 transition duration-150 ease-out group-hover:translate-x-1 group-active:opacity-50">
                                <path fill-rule="evenodd"
                                    d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="javascript:void(0)"
                            class="group flex flex-none items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="inline-block size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <!-- END Actions -->
                </div>
                <!-- END Card Body -->
            </div>

            <div class="flex flex-col rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                <!-- Card Body -->
                <div class="flex grow flex-col gap-5 p-5">
                    <!-- Placeholder -->
                    <div
                        class="relative flex aspect-4/3 w-full items-center justify-center rounded-lg border border-gray-200 dark:border-gray-700/75">
                        <div
                            class="absolute inset-0 bg-[image:repeating-linear-gradient(315deg,_currentColor_0,_currentColor_1px,_transparent_0,_transparent_50%)] bg-[size:10px_10px] opacity-5">
                        </div>
                    </div>
                    <!-- END Placeholder -->

                    <!-- Content -->
                    <div>
                        <h3 class="font-bold">Monthly Revenue</h3>
                        <p class="mt-1 text-sm/relaxed text-gray-600 dark:text-gray-400">
                            Track your monthly revenue trends with detailed breakdowns by product
                            category and region...
                        </p>
                    </div>
                    <!-- END Content -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="javascript:void(0)"
                            class="group flex grow items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Voir</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-arrow-right inline-block size-4 transition duration-150 ease-out group-hover:translate-x-1 group-active:opacity-50">
                                <path fill-rule="evenodd"
                                    d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="javascript:void(0)"
                            class="group flex flex-none items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="inline-block size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <!-- END Actions -->
                </div>
                <!-- END Card Body -->
            </div>
        </div>

        <div class="grow border-t border-gray-200 px-5 py-4 dark:border-gray-700">
            <!-- Pagination -->
            <div class="text-center dark:text-gray-100">
                <!-- Visible on mobile -->
                <nav class="flex sm:hidden">
                    <a href="javascript:void(0)"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                        <svg class="hi-mini hi-chevron-left -mx-1.5 inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div class="flex grow items-center justify-center px-2 sm:px-4">
                        <span>Page <span class="font-semibold">2</span> of
                            <span class="font-semibold">20</span></span>
                    </div>
                    <a href="javascript:void(0)"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                        <svg class="hi-mini hi-chevron-right -mx-1.5 inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
                <!-- END Visible on mobile -->

                <!-- Visible on desktop -->
                <div class="hidden sm:flex sm:items-center sm:justify-between">
                    <div>
                        Page <span class="font-semibold">2</span> of
                        <span class="font-semibold">20</span>
                    </div>
                    <nav class="inline-flex">
                        <a href="javascript:void(0)"
                            class="-mr-px inline-flex items-center justify-center gap-2 rounded-l-lg border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="hi-mini hi-chevron-left -mx-1.5 inline-block size-5"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="javascript:void(0)"
                            class="-mr-px inline-flex items-center justify-center gap-2 border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            1
                        </a>
                        <a href="javascript:void(0)"
                            class="-mr-px inline-flex items-center justify-center gap-2 border border-gray-200 bg-gray-100 px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-700/75 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            2
                        </a>
                        <a href="javascript:void(0)"
                            class="-mr-px inline-flex items-center justify-center gap-2 border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            3
                        </a>
                        <div
                            class="-mr-px flex items-center justify-center border border-gray-200 bg-white px-4 text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                            ...
                        </div>
                        <a href="javascript:void(0)"
                            class="-mr-px inline-flex items-center justify-center gap-2 border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            19
                        </a>
                        <a href="javascript:void(0)"
                            class="-mr-px inline-flex items-center justify-center gap-2 border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            20
                        </a>
                        <a href="javascript:void(0)"
                            class="inline-flex items-center justify-center gap-2 rounded-r-lg border border-gray-200 bg-white px-4 py-2 leading-6 font-semibold text-gray-800 hover:z-1 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:z-1 focus:ring-3 focus:ring-gray-300/25 active:z-1 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="hi-mini hi-chevron-right -mx-1.5 inline-block size-5"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                    <!-- END Visible on desktop -->
                </div>
            </div>
            <!-- END Pagination -->
        </div>
    </div>
@endsection
