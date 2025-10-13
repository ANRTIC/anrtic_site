<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100"
    x-data="{ openAdd: false }">
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
                    <li>Evénements</li>
                </ol>
            </nav>
            <h2 class="text-2xl font-bold">Tous les événements</h2>
        </div>
        <div
            class="flex items-center justify-center gap-2 rounded-sm px-2 py-3 sm:justify-end sm:bg-transparent sm:px-0">
            <button x-on:click="openAdd = true" type="button"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-4 py-2 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                </svg>
                <span>Ajouter un événement</span>
            </button>
        </div>
    </div>

    <div class="fullcalendar">

    </div>

    <!-- Modal -->
    <div x-cloak x-show="openAdd" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-bind:aria-hidden="!openAdd" tabindex="-1" role="dialog"
        class="fixed inset-0 z-90 overflow-x-hidden overflow-y-auto bg-gray-900/75 p-4 backdrop-blur-xs lg:p-8">
        <!-- Modal Dialog -->
        <div x-cloak x-show="openAdd" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-125" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-125" role="document"
            class="mx-auto flex w-full max-w-md flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
            <div class="flex items-center justify-between bg-gray-50 px-5 py-4 dark:bg-gray-700/50">
                <h3 class="flex items-center gap-2 font-medium">
                    <svg class="inline-block size-5 opacity-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM11 11H13V13H11V11ZM16 11H18V13H16V11Z">
                        </path>
                    </svg>
                    <span>Ajouter un nouvel événement</span>
                </h3>
                <div class="-my-4">
                    <button x-on:click="openAdd = false" type="button"
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
            <form enctype="multipart/form-data" class="space-y-6 p-5" wire:submit="save">
                <div class="space-y-1">
                    <label class="inline-block font-medium">Titre</label>
                    <input type="text" wire:model='title' placeholder="Saisir le titre"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="inline-block font-medium">Objet</label>
                    <input type="text" wire:model='object' placeholder="Saisir l'objet"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('object')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="inline-block font-medium">Description</label>
                    <textarea wire:model='description' rows="4" placeholder="Saisir la description"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500">
                    </textarea>
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="inline-block font-medium">Date</label>
                    <input type="date" wire:model="date"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="inline-block font-medium">Lieu</label>
                    <input type="text" wire:model='location' placeholder="Saisir le lieu"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('location')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="group relative inline-flex items-center gap-3">
                        <input type="checkbox" class="peer sr-only" wire:model='is_online' />
                        <span
                            class="relative h-7 w-12 flex-none rounded-full bg-gray-300 transition-all duration-150 ease-out peer-checked:bg-green-500 peer-focus:ring-3 peer-focus:ring-green-500/50 peer-focus:ring-offset-2 peer-focus:ring-offset-white peer-disabled:cursor-not-allowed peer-disabled:opacity-75 before:absolute before:top-1 before:left-1 before:size-5 before:rounded-full before:bg-white before:transition-transform before:duration-150 before:ease-out before:content-[''] peer-checked:before:translate-x-full dark:bg-gray-700 dark:peer-checked:bg-green-500 dark:peer-focus:ring-offset-gray-900"></span>
                        <span class="font-medium">Voulez-vous publier cet événement ?</span>
                    </label>
                </div>
                <div class="space-x-1 bg-gray-50 py-4 text-right dark:bg-gray-700/50">
                    <button x-on:click="openAdd = false" type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                        Annuler
                    </button>
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
