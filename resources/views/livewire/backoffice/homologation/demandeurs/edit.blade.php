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
                    <li>Demandeurs</li>
                </ol>
            </nav>
            <h2 class="text-2xl font-bold">Modifier un demandeur</h2>
        </div>
    </div>

    <div class="flex flex-col mt-4 overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
        <div class="grow p-5 md:flex md:gap-5">
            <form class="space-y-6 w-full" wire:submit='save'>
                <h1 class="inline-block text-xl">Identifications du demandeur</h1>
                <div class="space-y-1">
                    <label class="inline-block font-medium">Nom complet</label>
                    <input type="text" wire:model='d_nom_complet' placeholder="Saisir le nom complet"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('d_nom_complet')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="inline-block font-medium">Adresse</label>
                    <input type="text" wire:model='d_adresse' placeholder="Saisir l'adresse"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('d_adresse')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="inline-block font-medium">Adresse email</label>
                    <input type="email" wire:model='d_email' placeholder="Saisir l'adresse email"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('d_email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="inline-block font-medium">N° téléphone</label>
                    <input type="text" wire:model='d_telephone' placeholder="Saisir le numéro de téléphone"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('d_telephone')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="space-y-1">
                    <label class="group relative inline-flex items-center gap-3">
                        <input type="checkbox" wire:model='has_representative' wire:poll class="peer sr-only"
                            id="switch1" name="switch1" />
                        <span
                            class="relative h-7 w-12 flex-none rounded-full bg-gray-300 transition-all duration-150 ease-out peer-checked:bg-green-500 peer-focus:ring-3 peer-focus:ring-green-500/50 peer-focus:ring-offset-2 peer-focus:ring-offset-white peer-disabled:cursor-not-allowed peer-disabled:opacity-75 before:absolute before:top-1 before:left-1 before:size-5 before:rounded-full before:bg-white before:transition-transform before:duration-150 before:ease-out before:content-[''] peer-checked:before:translate-x-full dark:bg-gray-700 dark:peer-checked:bg-green-500 dark:peer-focus:ring-offset-gray-900"></span>
                        <span class="font-medium">Ce demandeur a-t-il un représentant local ?</span>
                    </label>
                </div>

                @if ($has_representative)
                    <h1 class="inline-block text-xl">Identifications du représentant local</h1>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Nom complet</label>
                        <input type="text" wire:model='r_nom_complet' placeholder="Saisir le nom complet"
                            class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('r_nom_complet')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Adresse</label>
                        <input type="text" wire:model='r_adresse' placeholder="Saisir l'adresse"
                            class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('r_adresse')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">Adresse email</label>
                        <input type="email" wire:model='r_email' placeholder="Saisir l'adresse email"
                            class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('r_email')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="inline-block font-medium">N° téléphone</label>
                        <input type="text" wire:model='r_telephone' placeholder="Saisir le numéro de téléphone"
                            class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                        <p class="text-sm text-red-600 dark:text-red-400">
                            @error('r_telephone')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                @endif
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90 ml-auto">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>

</div>
