<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">

    <div class="flex flex-col gap-3 bg-gray-50 px-5 py-4 text-center sm:flex-row sm:items-center sm:justify-between sm:gap-0 sm:text-left dark:bg-gray-700/50">
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
            <h2 class="text-2xl font-bold">Ajouter un nouvel équipement</h2>
        </div>
    </div>

    <div class="flex flex-col mt-4 overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
        <div class="grow p-5 md:flex md:gap-5">
            @if ($step === 1)
                <form class="space-y-6 w-full" wire:submit.prevent='firstStep'>
                    <h1 class="inline-block text-xl">Identifications du demandeur</h1>
                    <div class="space-y-1">
                        <select wire:model='demandeur_id'
                            class="block w-full rounded-lg border border-gray-200 py-3 pr-10 pl-5 leading-6 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:focus:border-green-500">
                            <option selected>Choisir le demandeur</option>
                            @foreach ($demandeurs as $demandeur)
                                <option value="{{ $demandeur->id }}">{{ $demandeur->nom_complet }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('demandeur_id')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90 ml-auto">
                        Suivant
                    </button>
                </form>
            @endif
            @if ($step === 2)
                <form enctype="multipart/form-data" class="space-y-6 w-full" wire:submit.prevent='secondStep'>
                    <h1 class="inline-block text-xl">Identifications de l'équipement</h1>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Photos</label>
                        <div class="space-y-4 sm:flex sm:items-center sm:gap-4 sm:space-y-0">
                            <input type="file" name="photos[]" wire:model="photos" multiple
                                class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-sm file:border-0 file:bg-green-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-green-700 hover:file:bg-green-100 dark:text-gray-400 dark:file:bg-green-200 dark:file:text-green-800 dark:hover:file:bg-green-300" />
                            <p class="text-sm text-red-600 dark:text-red-400">
                                @error('photos')
                                    {{ $message }}
                                @enderror
                            </p>
                                <p class="text-sm text-red-600 dark:text-red-400">
                                @error('photos.*')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Désignation</label>
                        <input type="text" wire:model='designation' placeholder="Saisir la désignation"
                            class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('designation')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Modèle</label>
                        <input type="text" wire:model='modele' placeholder="Saisir le modèle"
                            class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('modele')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Catégorie</label>
                        <select name="category_id" wire:model='category_id'
                            class="block w-full rounded-lg border border-gray-200 py-3 pr-10 pl-5 leading-6 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:focus:border-green-500">
                            <option selected>Choisir une catégorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('category_id')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Marque</label>
                        <select name="marque_id" wire:model='marque_id'
                            class="block w-full rounded-lg border border-gray-200 py-3 pr-10 pl-5 leading-6 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:focus:border-green-500">
                            <option selected>Choisir une marque</option>
                            @foreach ($marques as $marque)
                                <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('marque_id')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <button type="button" wire:click='previousStep'
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-700 bg-gray-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-gray-600 hover:bg-gray-600 hover:text-white focus:ring-3 focus:ring-gray-400/50 active:border-gray-700 active:bg-gray-700 dark:focus:ring-gray-400/90 ml-auto">
                        Précédent
                    </button>
                    <button type="submit" 
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90 ml-auto">
                        Suivant
                    </button>
                </form>
            @endif
            @if ($step === 3)
                <form enctype="multipart/form-data" class="space-y-6 w-full" wire:submit.prevent='save'>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Quel est l'état d'homologation de cet équipement
                            ?</label>
                        <select wire:model='statut' wire:poll
                            class="block w-full rounded-lg border border-gray-200 py-3 pr-10 pl-5 leading-6 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:focus:border-green-500">
                            <option selected>Choisir un statut</option>
                            @foreach ($statut_choices as $el)
                                <option value="{{ $el }}">{{ $el }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('statut')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    @if (trim($statut) === $statut_choices[0])
                        <div class="space-y-1">
                            <label class="inline-block font-medium">Numéro de certification</label>
                            <input type="text" wire:model='numero' placeholder="Saisir le numero de certification"
                                class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                            <p class="text-sm text-red-600 dark:text-red-400">
                                @error('numero')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="space-y-1">
                            <label class="inline-block font-medium">Date d'émission</label>
                            <input type="date" wire:model='date_emission'
                                class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                            <p class="text-sm text-red-600 dark:text-red-400">
                                @error('date_emission')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="space-y-1">
                            <label class="inline-block font-medium">Document</label>
                            <input type="file" wire:model="document"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-sm file:border-0 file:bg-green-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-green-700 hover:file:bg-green-100 dark:text-gray-400 dark:file:bg-green-200 dark:file:text-green-800 dark:hover:file:bg-green-300" />
                            <p class="text-sm text-red-600 dark:text-red-400">
                                @error('document')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    @endif
                    <button type="button" wire:click='previousStep'
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-700 bg-gray-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-gray-600 hover:bg-gray-600 hover:text-white focus:ring-3 focus:ring-gray-400/50 active:border-gray-700 active:bg-gray-700 dark:focus:ring-gray-400/90 ml-auto">
                        Précédent
                    </button>
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90 ml-auto">
                        Enregistrer
                    </button>
                </form>
            @endif
        </div>
    </div>

</div>
