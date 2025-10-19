<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100" x-data="{ open: false }">
    <!-- Card -->
    <div
        class="flex flex-col gap-3 bg-gray-50 px-5 py-4 text-center sm:flex-row sm:items-center sm:justify-between sm:gap-0 sm:text-left dark:bg-gray-700/50">
        <div>
            <nav class="text-sm font-medium dark:text-gray-100">
                <ol class="flex items-center justify-center sm:justify-start">
                    <li>
                        <a href="javascript:void(0)"
                            class="text-green-600 hover:text-green-400 dark:text-green-400 dark:hover:text-green-300">Homologation</a>
                    </li>
                    <li class="flex items-center px-1 opacity-25">
                        <svg class="hi-mini hi-chevron-right inline-block size-5" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                    <li>Equipements</li>
                </ol>
            </nav>
            <h2 class="text-2xl font-bold">Tous les équipements</h2>
        </div>
        <div
            class="flex items-center justify-center gap-2 rounded-sm px-2 py-3 sm:justify-end sm:bg-transparent sm:px-0">
            <a href="{{ route('backoffice.homologation.equipements.ajouter') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-4 py-2 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90"
                wire:navigate>
                <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                </svg>
                <span>Ajouter un équipement</span>
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="flex flex-col mt-4 rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
        <div class="mb-2 grow rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
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
                <input type="text" wire:model.live.debounce="search"
                    class="block w-full rounded-lg border border-gray-200 py-2 pr-3 pl-10 text-sm leading-6 placeholder-gray-400 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-800 dark:bg-gray-900 dark:focus:border-green-500"
                    placeholder="Rechercher..." />
            </div>
        </div>
    </div>

</div>
