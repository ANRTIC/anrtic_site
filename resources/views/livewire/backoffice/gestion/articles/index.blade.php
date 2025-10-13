<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100"
    x-data="{ open: false }">
    <!-- Card -->
    <div class="flex flex-col gap-3 bg-gray-50 px-5 py-4 text-center sm:flex-row sm:items-center sm:justify-between sm:gap-0 sm:text-left dark:bg-gray-700/50">
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
            <a href="{{ route('backoffice.articles.ajouter') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-4 py-2 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90"
                wire:navigate>
                <svg class=" inline-block size-5 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                </svg>
                <span>Ajouter un article</span>
            </a>
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
                type="text" wire:model.live.debounce="search" placeholder="Rechercher..." />
        </div>
    </div>

    <!-- Card Body -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:gap-8">
        @forelse ($articles as $article)
            <div class="flex flex-col rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100">
                <!-- Card Body -->
                <div class="flex grow flex-col gap-5 p-5">
                    <!-- Placeholder -->
                    <a href="{{ route('backoffice.articles.modifier', $article->id) }}"
                        class="group relative flex overflow-hidden transition ease-out aspect-4/3 w-full items-center justify-center rounded-lg border border-gray-200 dark:border-gray-700/75">
                        <img src="{{ $article->thumbnail() }}" alt="{{ $article->short_description }}"
                            class="transition ease-out group-hover:scale-110" />
                    </a>
                    <!-- END Placeholder -->

                    <!-- Content -->
                    <div>
                        <a href="{{ route('backoffice.articles.modifier', $article->id) }}"
                            class="hover:text-green-600">
                            <h3 class="font-bold">
                                {{ Str::limit($article->short_description, 40) }} 

                                @if ($article->is_online)
                                    <div class="inline-flex rounded-sm bg-green-100 mx-2 px-2 py-1 text-sm leading-4 font-semibold text-green-900">
                                        Publié
                                    </div>
                                @else
                                    <div class="inline-flex rounded-sm bg-orange-100 mx-2 px-2 py-1 text-sm leading-4 font-semibold text-orange-900">
                                        Non publié
                                    </div>
                                @endif
                            </h3>
                            <p class="mt-1 text-sm/relaxed text-gray-600 dark:text-gray-400">
                                {!! Str::limit($article->content, 130) !!}
                            </p>
                        </a>
                    </div>
                    <!-- END Content -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="javascript:void(0)"
                            class="group flex grow items-center justify-between gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <span>Voir</span>
                            <svg class="inline-block size-4 transition duration-150 ease-out group-hover:translate-x-1 group-active:opacity-50"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z">
                                </path>
                            </svg>
                        </a>
                        <button type="button" x-on:click="open = true" wire:click="selectPost({{ $article }})"
                            class="group flex flex-none items-center justify-between gap-2 rounded-lg border border-red-200 bg-red-500 px-3 py-2 text-sm leading-5 font-semibold text-white hover:bg-red-600 hover:border-red-400 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                            <svg class="inline-block size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <!-- END Actions -->
                </div>
                <!-- END Card Body -->
            </div>
        @empty
            <div class="relative px-6 w-full py-20 md:py-40 dark:border-gray-700">
                <div class="relative flex flex-col gap-5 text-center">
                    <div class="relative inline-flex items-center justify-center">
                        <svg class="inline-block size-12 text-green-600 dark:text-green-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                            </path>
                        </svg>
                    </div>
                    <div class="mx-auto">
                        <h3 class="mb-2 text-2xl font-bold">Cette page est vide</h3>
                        <p class="text-sm/relaxed font-medium text-gray-600 dark:text-gray-400">
                            Vos article apparaiteront ici!
                        </p>
                    </div>
                </div>
            </div>
        @endforelse
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
                        Êtes-vous sûr de vouloir supprimer cet article ?
                    </p>
                </div>
            </div>
            <div class="space-x-1 bg-gray-50 px-5 py-4 text-right dark:bg-gray-700/50">
                <button x-on:click="open = false" type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                    Annuler
                </button>
                <button x-on:click="open = false" type="button" wire:click="deletePost"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-rose-700 bg-rose-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-rose-600 hover:bg-rose-600 hover:text-white focus:ring-3 focus:ring-rose-400/50 active:border-rose-700 active:bg-rose-700 dark:focus:ring-rose-400/90">
                    Supprimer
                </button>
            </div>
        </div>
        <!-- END Modal Dialog -->
    </div>

    <!-- Pagination -->
    <div class="grow border-t border-gray-200 px-5 py-4 dark:border-gray-700">
        {{ $articles->links() }}
    </div>
</div>
