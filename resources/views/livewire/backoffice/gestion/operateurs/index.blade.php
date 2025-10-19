<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100" x-data="{ open: false }">
    <!-- Card -->
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
                    <li>Opérateurs</li>
                </ol>
            </nav>
            <h2 class="text-2xl font-bold">Tous les opérateurs</h2>
        </div>
        <div
            class="flex items-center justify-center gap-2 rounded-sm px-2 py-3 sm:justify-end sm:bg-transparent sm:px-0">
            <a href="{{ route('backoffice.operateurs.ajouter') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-4 py-2 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90"
                wire:navigate>
                <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                </svg>
                <span>Ajouter un opérateur</span>
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
        <div class="grow rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
            <!-- Responsive Table Container -->
            <div class="min-w-full overflow-x-auto rounded-sm">
                <table class="min-w-full align-middle text-sm whitespace-nowrap">
                    <!-- Table Header -->
                    <thead>
                        <tr>
                            <th class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">

                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>Nom</span>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>Email</span>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>N° téléphone</span>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>Site web</span>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <div class="inline-flex items-center gap-2">
                                    <span>Statut</span>
                                    <button type="button"
                                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-1.5 py-1 text-sm leading-5 font-semibold text-gray-800 opacity-25 transition group-hover:opacity-100 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                                        <svg class="hi-mini hi-chevron-up-down inline-block size-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-right font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                <span>Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <!-- END Table Header -->

                    <!-- Table Body -->
                    <tbody>
                        @forelse ($operateurs as $operateur)
                            <tr class="even:bg-gray-50 dark:even:bg-gray-900/50">
                                <td class="p-3">
                                    <img
                                        src="{{ $operateur->logoURL() }}"
                                        alt="{{ $operateur->name }}"
                                        class="inline-block size-10 rounded-full"
                                    />
                                </td>
                                <td class="p-3">
                                    <p class="font-medium">{{ $operateur->name }}</p>
                                </td>
                                <td class="p-3">
                                    <p class="font-medium">{{ $operateur->email }}</p>
                                </td>
                                <td class="p-3">
                                    <p class="font-medium">{{ $operateur->phone }}</p>
                                </td>
                                <td class="p-3">
                                    <p class="font-medium">{{ $operateur->website }}</p>
                                </td>
                                <td class="p-3">
                                    @if ($operateur->is_active)
                                        <div
                                            class="inline-flex rounded-full border border-transparent bg-green-100 px-2 py-1 text-xs leading-4 font-semibold text-green-900 dark:border-green-900 dark:bg-green-700/10 dark:font-medium dark:text-green-200">
                                            Publié
                                        </div>
                                    @else
                                        <div
                                            class="inline-flex rounded-full border border-transparent bg-orange-100 px-2 py-1 text-xs leading-4 font-semibold text-orange-900 dark:border-orange-900/75 dark:bg-orange-700/10 dark:font-medium dark:text-orange-200">
                                            Non publié
                                        </div>
                                    @endif

                                </td>
                                <td class="py-3 pl-3 text-right">
                                    <div class="inline-flex items-center gap-1">
                                        <a href="{{ route('backoffice.operateurs.modifier', $operateur->id) }}"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:bg-gray-600 hover:border-gray-300 hover:text-white hover:shadow-xs dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:active:border-gray-700"
                                            wire:navigate>
                                            Modifier
                                        </a>
                                        <button type="button"
                                            x-on:click="open = true"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-500 px-2 py-1 text-sm leading-5 font-semibold text-white hover:bg-red-600 hover:border-red-400 hover:text-white hover:shadow-xs dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:active:border-gray-700"
                                            wire:click="selectOperateur({{ $operateur }})">
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td
                                    class="text-red-500 font-medium text-center p-2"
                                    colspan="7"
                                >
                                    Rien à afficher
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <!-- END Table Body -->
                </table>
            </div>
            <!-- END Responsive Table Container -->
        </div>
    </div>

    <!-- Modal Backdrop -->
    <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-bind:aria-hidden="!open" tabindex="-1" role="dialog"
        class="fixed inset-0 z-90 overflow-x-hidden overflow-y-auto bg-gray-900/75 p-4 backdrop-blur-xs lg:p-8">
        <!-- Modal Dialog -->
        <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-125" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-125" role="document"
            class="mx-auto flex w-full max-w-md flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
            <div class="flex grow gap-5 px-5 py-7">
                <div
                    class="flex size-14 flex-none items-center justify-center rounded-full bg-rose-100 text-rose-500 dark:bg-rose-700/50 dark:text-rose-300">
                    <svg class="hi-outline hi-shield-exclamation inline-block size-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <div>
                    <h4 class="mb-1 text-lg font-bold">Confirmation</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Êtes-vous sûr de vouloir supprimer cet opérateur ?
                    </p>
                </div>
            </div>
            <div class="space-x-1 bg-gray-50 px-5 py-4 text-right dark:bg-gray-700/50">
                <button x-on:click="open = false" type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                    Annuler
                </button>
                <button x-on:click="open = false" 
                    type="button"
                    wire:click="deleteOperateur"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-rose-700 bg-rose-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-rose-600 hover:bg-rose-600 hover:text-white focus:ring-3 focus:ring-rose-400/50 active:border-rose-700 active:bg-rose-700 dark:focus:ring-rose-400/90">
                    Supprimer
                </button>
            </div>
        </div>
        <!-- END Modal Dialog -->
    </div>

    <!-- Pagination -->
    <div class="grow border-t border-gray-200 px-5 py-4 dark:border-gray-700">
        {{ $operateurs->links() }}
    </div>
</div>
