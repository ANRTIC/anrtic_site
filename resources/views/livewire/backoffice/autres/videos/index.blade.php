<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100" x-data="{ open: false }">
    <!-- Card -->
    <div class="flex flex-col gap-3 bg-gray-50 px-5 py-4 text-center sm:flex-row sm:items-center sm:justify-between sm:gap-0 sm:text-left dark:bg-gray-700/50">
        <div>
            <nav class="text-sm font-medium dark:text-gray-100">
                <ol class="flex items-center justify-center sm:justify-start">
                    <li>
                        <a href="javascript:void(0)"
                            class="text-green-600 hover:text-green-400 dark:text-green-400 dark:hover:text-green-300">Autres</a>
                    </li>
                    <li class="flex items-center px-1 opacity-25">
                        <svg class="hi-mini hi-chevron-right inline-block size-5" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                    <li>Vidéos</li>
                </ol>
            </nav>
            <h2 class="text-2xl font-bold">Toutes les vidéos</h2>
        </div>
        <div
            class="flex items-center justify-center gap-2 rounded-sm px-2 py-3 sm:justify-end sm:bg-transparent sm:px-0">
            <a href="{{ route('backoffice.videos.ajouter') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-4 py-2 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90"
                wire:navigate>
                <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                </svg>
                <span>Ajouter une vidéo</span>
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="flex flex-col mt-4 rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
        <div
            class="mb-2 grow rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
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
        <div
            class="grow rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
            <div class="min-w-full overflow-x-auto rounded-sm">
                <table class="min-w-full align-middle text-sm whitespace-nowrap">
                    <thead>
                        <tr>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>Titre</span>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>Lien</span>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>Statut</span>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-right font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <span></span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($videos as $video)
                            <tr class="even:bg-gray-50 dark:even:bg-gray-900/50">
                                <td class="p-3">
                                    <p class="font-medium">{{ $video->title }}</p>
                                </td>
                                <td class="p-3">
                                    <a
                                        href="{{ $video->link }}"
                                        target="_blank"
                                        class="inline-flex items-center justify-center px-2 py-1 text-bold text-emerald-600 hover:text-emerald-500 cursor-pointer"
                                    >
                                        <svg 
                                            class="inline-block size-4"
                                            xmlns="http://www.w3.org/2000/svg" 
                                            viewBox="0 0 24 24" 
                                            fill="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V11H19L18.9999 6.413L11.2071 14.2071L9.79289 12.7929L17.5849 5H13V3H21Z"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-3">
                                    @if ($video->is_online)
                                        <div class="inline-flex rounded-full border border-transparent bg-green-100 px-2 py-1 text-xs leading-4 font-semibold text-green-900 dark:border-green-900 dark:bg-green-700/10 dark:font-medium dark:text-green-200">
                                            Publiée
                                        </div>
                                    @else
                                        <div class="inline-flex rounded-full border border-transparent bg-orange-100 px-2 py-1 text-xs leading-4 font-semibold text-orange-900 dark:border-orange-900/75 dark:bg-orange-700/10 dark:font-medium dark:text-orange-200">
                                            Non publiée
                                        </div>
                                    @endif
                                </td>
                                <td class="py-3 pl-3 text-right">
                                    <div class="inline-flex items-center gap-1">
                                        <a href="{{ route('backoffice.videos.modifier', $video->id) }}"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:bg-gray-600 hover:border-gray-300 hover:text-white hover:shadow-xs dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:active:border-gray-700"
                                            wire:navigate>
                                            Modifier
                                        </a>
                                        <button type="button"
                                            x-on:click="open = true"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-500 px-2 py-1 text-sm leading-5 font-semibold text-white hover:bg-red-600 hover:border-red-400 hover:text-white hover:shadow-xs dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:active:border-gray-700"
                                            wire:click="selectVideo({{ $video }})">
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td
                                    class="text-red-500 font-medium text-center p-2"
                                    colspan="3"
                                >
                                    Rien à afficher
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>