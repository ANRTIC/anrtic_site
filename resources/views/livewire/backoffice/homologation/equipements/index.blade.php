<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100"
    x-data="{ open: false, openDemandeurModal: false }">
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
    <div
        class="flex flex-col mt-4 rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
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
                                Désignation
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                Modèle
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                Catégorie
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                Marque
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                Certificat
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                Demandeur
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                Statut
                            </th>
                            <th
                                class="group bg-gray-100/75 px-3 py-4 text-right font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($equipements as $equipement)
                            <tr class="even:bg-gray-50 dark:even:bg-gray-900/50">
                                <td class="p-3">
                                    <p class="font-medium">{{ $equipement->designation }}</p>
                                </td>
                                <td class="p-3">
                                    <p class="font-medium">{{ $equipement->modele }}</p>
                                </td>
                                <td class="p-3">
                                    <p class="font-medium">{{ $equipement->categorie->name }}</p>
                                </td>
                                <td class="p-3">
                                    <p class="font-medium">{{ $equipement->marque->name }}</p>
                                </td>
                                <td class="p-3">
                                @if ($equipement->certificat)
                                    <a href="{{ $equipement->certificat->document() }}" target="_blank"
                                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-200 dark:bg-gray-200 dark:hover:border-gray-300 dark:hover:bg-gray-300 dark:focus:ring-gray-500/50 dark:active:border-gray-200 dark:active:bg-gray-200">
                                        <svg class=" inline-block size-5 opacity-50"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M13 10H18L12 16L6 10H11V3H13V10ZM4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19Z">
                                            </path>
                                        </svg>
                                    </a>
                                @endif
                                </td>
                                <td class="p-3">
                                    <button type="button" x-on:click="openDemandeurModal = true"
                                        wire:click='selectEquipement({{ $equipement }})'
                                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-200 dark:bg-gray-200 dark:hover:border-gray-300 dark:hover:bg-gray-300 dark:focus:ring-gray-500/50 dark:active:border-gray-200 dark:active:bg-gray-200">
                                        <svg class="inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z">
                                            </path>
                                        </svg>
                                    </button>
                                </td>
                                <td class="p-3">
                                    @if (trim($equipement->statut) === $statut_choices[0])
                                        <div
                                            class="inline-flex rounded-sm bg-green-100 px-2 py-1 text-sm leading-4 font-semibold text-green-600">
                                            {{ $equipement->statut }}
                                        </div>
                                    @endif

                                    @if (trim($equipement->statut) === $statut_choices[1])
                                        <div
                                            class="inline-flex rounded-sm bg-red-100 px-2 py-1 text-sm leading-4 font-semibold text-red-600">
                                            {{ $equipement->statut }}
                                        </div>
                                    @endif

                                    @if (trim($equipement->statut) === $statut_choices[2])
                                        <div
                                            class="inline-flex rounded-sm bg-yellow-100 px-2 py-1 text-sm leading-4 font-semibold text-yellow-600">
                                            {{ $equipement->statut }}
                                        </div>
                                    @endif
                                </td>
                                <td class="py-3 pl-3 text-right">
                                    <div class="inline-flex items-center gap-1">
                                        <a href="{{ route('backoffice.homologation.equipements.informations', $equipement->id) }}"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:bg-gray-600 hover:border-gray-300 hover:text-white hover:shadow-xs dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:active:border-gray-700"
                                            wire:navigate>
                                            Voir
                                        </a>
                                        <button type="button" x-on:click="open = true"
                                            wire:click='selectEquipement({{ $equipement }})'
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-500 px-2 py-1 text-sm leading-5 font-semibold text-white hover:bg-red-600 hover:border-red-400 hover:text-white hover:shadow-xs dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:active:border-gray-700">
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-red-500 font-medium text-center p-2" colspan="8">
                                    Rien à afficher
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Demandeur informations -->
    <div x-cloak x-show="openDemandeurModal" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-bind:aria-hidden="!openDemandeurModal" tabindex="-1" role="dialog"
        class="fixed inset-0 z-90 overflow-x-hidden overflow-y-auto bg-gray-900/75 p-4 backdrop-blur-xs lg:p-8">
        <!-- Modal Dialog -->
        <div x-cloak x-show="openDemandeurModal" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-125" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-125" role="document"
            class="mx-auto flex w-full max-w-md flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
            <div class="flex items-center justify-between bg-gray-50 px-5 py-4 dark:bg-gray-700/50">
                <h3 class="flex items-center gap-2 font-medium">
                    <svg class="inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11 14.0619V20H13V14.0619C16.9463 14.554 20 17.9204 20 22H4C4 17.9204 7.05369 14.554 11 14.0619ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z">
                        </path>
                    </svg>
                    <span>Identifications du demandeur</span>
                </h3>
                <div class="-my-4">
                    <button x-on:click="openDemandeurModal = false" type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-transparent px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-transparent dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                        <svg class="hi-solid hi-x -mx-1 inline-block size-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="grow p-5">
                <div class="flex flex-col gap-4 text-sm">
                    <div class="flex justify-between gap-2">
                        <span class="text-gray-600 dark:text-gray-400">Nom complet:</span>
                        <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                            {{ $this->selected ? $this->selected->demandeur->nom_complet : '' }}
                        </span>
                    </div>
                    <div class="flex justify-between gap-2">
                        <span class="text-gray-600 dark:text-gray-400">Adresse:</span>
                        <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                            {{ $this->selected ? $this->selected->demandeur->adresse : '' }}
                        </span>
                    </div>
                    <div class="flex justify-between gap-2">
                        <span class="text-gray-600 dark:text-gray-400">Email:</span>
                        <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                            {{ $this->selected ? $this->selected->demandeur->email : '' }}
                        </span>
                    </div>
                    <div class="flex justify-between gap-2">
                        <span class="text-gray-600 dark:text-gray-400">N° téléphone:</span>
                        <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                            {{ $this->selected ? $this->selected->demandeur->telephone : '' }}
                        </span>
                    </div>
                    @if ($this->selected?->demandeur->representant()->exists())
                        <span
                            class="inline-flex items-center justify-center gap-1 rounded-lg border border-gray-200 bg-white px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Identifications du représentant</span>
                        </span>
                        <div class="flex justify-between gap-2">
                            <span class="text-gray-600 dark:text-gray-400">Nom complet:</span>
                            <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                                {{ $this->selected->demandeur->representant->nom_complet }}
                            </span>
                        </div>
                        <div class="flex justify-between gap-2">
                            <span class="text-gray-600 dark:text-gray-400">Adresse:</span>
                            <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                                {{ $this->selected->demandeur->representant->adresse }}
                            </span>
                        </div>
                        <div class="flex justify-between gap-2">
                            <span class="text-gray-600 dark:text-gray-400">Email:</span>
                            <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                                {{ $this->selected->demandeur->representant->email }}
                            </span>
                        </div>
                        <div class="flex justify-between gap-2">
                            <span class="text-gray-600 dark:text-gray-400">N° téléphone:</span>
                            <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                                {{ $this->selected->demandeur->representant->telephone }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="space-x-1 bg-gray-50 px-5 py-4 text-right dark:bg-gray-700/50">
                <button type="button" x-on:click="openDemandeurModal = false"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                    Fermer
                </button>
            </div>
        </div>
        <!-- END Modal Dialog -->
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
                    <svg class="hi-outline hi-shield-exclamation inline-block size-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <div>
                    <h4 class="mb-1 text-lg font-bold">Confirmation</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Êtes-vous sûr de vouloir supprimer cet équipement ?
                    </p>
                </div>
            </div>
            <div class="space-x-1 bg-gray-50 px-5 py-4 text-right dark:bg-gray-700/50">
                <button x-on:click="open = false" type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                    Annuler
                </button>
                <button x-on:click="open = false" type="button" wire:click="deleteEquipement"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-rose-700 bg-rose-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-rose-600 hover:bg-rose-600 hover:text-white focus:ring-3 focus:ring-rose-400/50 active:border-rose-700 active:bg-rose-700 dark:focus:ring-rose-400/90">
                    Supprimer
                </button>
            </div>
        </div>
        <!-- END Modal Dialog -->
    </div>

    <!-- Pagination -->
    <div class="grow border-t border-gray-200 px-5 py-4 dark:border-gray-700">
        {{ $equipements->links() }}
    </div>

</div>
