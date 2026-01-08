<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">

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
            <h2 class="text-2xl font-bold">Informations générales de l'équipement</h2>
        </div>
    </div>

    <!-- Informations générales -->
    <div class="rounded-lg bg-gray-50 p-6 md:p-8 dark:bg-gray-700/25">
        <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-gray-100">
            {{ $equipement->designation }}
        </h2>
        <div class="flex flex-col gap-4 text-sm">
            <div class="flex justify-between gap-2">
                <span class="text-gray-600 dark:text-gray-400">Modèle:</span>
                <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                    {{ $equipement->modele }}
                </span>
            </div>
            <div class="flex justify-between gap-2">
                <span class="text-gray-600 dark:text-gray-400">Catégorie:</span>
                <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                    {{ $equipement->categorie()->exists() ? $equipement->categorie->name : '' }}
                </span>
            </div>
            <div class="flex justify-between gap-2">
                <span class="text-gray-600 dark:text-gray-400">Marque:</span>
                <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                    {{ $equipement->marque()->exists() ? $equipement->marque->name : '' }}
                </span>
            </div>
            <div class="flex justify-between gap-2">
                <span class="text-gray-600 dark:text-gray-400">Statut:</span>
                @if (trim($equipement->statut) === $statut_choices[0])
                    <div
                        class="inline-flex rounded-sm bg-green-100 px-2 py-1 text-sm leading-4 font-semibold text-gren-600">
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
            </div>
            @if (trim($equipement->statut) === $statut_choices[0])
                <div class="flex justify-between gap-2">
                    <span class="text-gray-600 dark:text-gray-400">Certificat:</span>
                    <span class="text-right font-medium text-gray-900 dark:text-gray-100">
                        <a href="{{ $equipement->certificat->document() }}" target="_blank"
                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-200 dark:bg-gray-200 dark:hover:border-gray-300 dark:hover:bg-gray-300 dark:focus:ring-gray-500/50 dark:active:border-gray-200 dark:active:bg-gray-200">
                            <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M13 10H18L12 16L6 10H11V3H13V10ZM4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19Z">
                                </path>
                            </svg>
                        </a>
                    </span>
                </div>
            @endif
            <div class="flex flex-col justify-between gap-2">
                <span class="text-gray-600 dark:text-gray-400">Images:</span>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 lg:gap-8">
                    <!-- Card -->
                    @foreach ($equipement->photos as $photo)
                    <div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                        <div class="grow p-5">
                            <img src="{{ $photo->image() }}"/>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="border-t border-dashed border-gray-200 pt-4 dark:border-gray-700/50">
                <a href="{{ route("backoffice.homologation.equipements.modifier", $equipement->id) }}"
                    wire:navigate
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-700 bg-gray-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-gray-600 hover:bg-gray-600 hover:text-white focus:ring-3 focus:ring-gray-400/50 active:border-gray-700 active:bg-gray-700 dark:focus:ring-gray-400/90 ml-auto">
                    Modifier
                </a>
            </div>
        </div>
    </div>

    <div class="flex flex-col mt-4 overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
        <div class="grow p-5 md:flex md:gap-5">
        </div>
    </div>


</div>
