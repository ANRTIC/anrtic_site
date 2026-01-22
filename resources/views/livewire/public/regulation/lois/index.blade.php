<div class="bg-white dark:bg-gray-800 dark:text-gray-100">
    <div class="container mx-auto space-y-12 px-4 py-16 lg:px-8 lg:py-32 xl:max-w-7xl">
        <!-- Heading -->
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-0">
            <div class="text-center lg:w-1/2 lg:text-left">
                <h2 class="mb-2 text-4xl font-black text-black dark:text-white">
                    Lois
                </h2>
            </div>
            <div class="text-center lg:w-1/2 lg:text-right">
                <form onsubmit="return false;" class="lg:inline-block lg:w-72">
                    <div class="relative">
                        <input type="text" wire:model.live.debounce="search" placeholder="Rechercher..."
                            class="block w-full rounded-lg border border-gray-200 py-3 pr-10 pl-5 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 my-px mr-px flex w-10 items-center justify-center text-gray-500">
                            <svg class="hi-mini hi-magnifying-glass inline-block size-5"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr class="border-gray-200 dark:border-gray-700/75" />

        <!-- Liste -->
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
            @forelse ($lois as $loi)
                <div>
                    <h3 class="mb-2 text-lg font-bold sm:text-xl">
                        <a href="#"
                            class="leading-7 text-green-600 dark:text-green-400">
                            N° {{ $el->reference }}
                        </a>
                    </h3>
                    <p class="mb-4 text-sm leading-relaxed text-gray-600 dark:text-gray-400">
                        {{ $loi->description }}
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="text-sm">
                            <p class="font-medium text-gray-600 dark:text-gray-400">
                                Publié le · {{ $loi->published_at->format('d M Y') }}
                            </p>
                            <p class="font-medium text-gray-600 dark:text-gray-400">
                                Adopté le · {{ $loi->adopted_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                    <a href="{{ Storage::url($loi->document) }}" target="_blank"
                        class="mt-2 inline-flex items-center justify-center gap-2 rounded-lg border border-green-200 bg-green-100 px-2 py-1 text-sm leading-5 font-semibold text-green-800 hover:border-green-300 hover:text-green-900 hover:shadow-xs focus:ring-3 focus:ring-green-300/25 active:border-green-200 active:shadow-none dark:border-green-200 dark:bg-green-200 dark:hover:border-green-300 dark:hover:bg-green-300 dark:focus:ring-green-500/50 dark:active:border-green-200 dark:active:bg-green-200">
                        Télécharger
                        <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M13 10H18L12 16L6 10H11V3H13V10ZM4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19Z">
                            </path>
                        </svg>
                    </a>
                </div>
            @empty
                <main id="page-content" class="col-span-1 lg:col-span-2">
                    <h1 class="mb-3 text-2xl text-center font-extrabold md:text-3xl text-red-600 dark:text-red-500">
                        Rien à afficher
                    </h1>
                </main>
            @endforelse

            <!-- Pagination -->
            <div class="col-span-1 lg:col-span-2 border-t border-gray-200 px-5 py-4 dark:border-gray-700">
                {{ $lois->links() }}
            </div>

        </div>
    </div>

</div>
