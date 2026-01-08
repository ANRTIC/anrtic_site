<!-- Sidebar Header -->
<div class="flex h-16 flex-none items-center justify-between border-b border-gray-100 px-4 dark:border-gray-700/75">
    <!-- Brand -->
    <a href="{{ route("backoffice.backoffice") }}" class="group inline-flex items-center gap-2 px-2.5 font-bold tracking-wide text-gray-900 hover:text-gray-600 dark:text-gray-100 dark:hover:text-gray-300"
        wire:navigate>
        <img src="{{ asset("logo/anrtic.png") }}" class="inline-block w-30 h-auto"/>
    </a>
    <!-- END Brand -->

    <!-- Close Sidebar on Mobile -->
    <div class="flex items-center lg:hidden">
        <button type="button"
            class="group relative inline-flex w-full items-center gap-2 rounded-lg p-2 text-sm leading-5 text-gray-800 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white">
            <span
                class="absolute inset-0 scale-50 rounded-lg bg-gray-200/75 opacity-0 transition ease-out group-hover:scale-100 group-hover:opacity-100 group-active:scale-105 group-active:bg-gray-200 dark:bg-gray-700/50 dark:group-active:bg-gray-700/75"></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                class="rehi-micro hi-x-mark relative inline-block size-4">
                <path
                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
            </svg>
        </button>
    </div>
    <!-- END Close Sidebar on Mobile -->
</div>


<!-- Sidebar -->
<div class="grow overflow-y-auto">
    <div class="flex flex-col gap-4 px-4 py-6">

        <!-- Navigation -->
        <nav class="flex flex-col gap-0.5">
            <a href="{{ route('backoffice.backoffice') }}"
                class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium text-green-700 hover:bg-gray-100/60 dark:text-green-400 dark:hover:bg-gray-700/50"
                wire:navigate>
                <svg class="inline-block size-4 text-md flex-none text-green-600 dark:text-green-400"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M21 20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V9.48907C3 9.18048 3.14247 8.88917 3.38606 8.69972L11.3861 2.47749C11.7472 2.19663 12.2528 2.19663 12.6139 2.47749L20.6139 8.69972C20.8575 8.88917 21 9.18048 21 9.48907V20ZM7 15V17H17V15H7Z">
                    </path>
                </svg>
                <span class="grow py-1.5">Tableau de bord</span>
            </a>

            @hasrole('SUPER_ADMIN')
                <h4 class="mx-2.5 pt-2 pb-2 text-sm font-semibold text-black dark:text-white">
                    Utilisateurs
                </h4>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Administrateurs homolagation</span>
                </a>
            @endhasrole

            @hasrole(['ADMIN', 'AGENT'])
                <h4 class="mx-2.5 pt-6 pb-2 text-sm font-semibold text-black dark:text-white">
                    Homologation
                </h4>
                @hasrole('ADMIN')
                    <a href="{{ route('backoffice.homologation.agents') }}"
                        class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50"
                        wire:navigate>
                        <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M1 5C1 4.44772 1.44772 4 2 4H22C22.5523 4 23 4.44772 23 5V19C23 19.5523 22.5523 20 22 20H2C1.44772 20 1 19.5523 1 19V5ZM13 8V10H19V8H13ZM18 12H13V14H18V12ZM10.5 10C10.5 8.61929 9.38071 7.5 8 7.5C6.61929 7.5 5.5 8.61929 5.5 10C5.5 11.3807 6.61929 12.5 8 12.5C9.38071 12.5 10.5 11.3807 10.5 10ZM8 13.5C6.067 13.5 4.5 15.067 4.5 17H11.5C11.5 15.067 9.933 13.5 8 13.5Z">
                            </path>
                        </svg>
                        <span class="grow py-1.5">Agents</span>
                    </a>
                @endhasrole

                <a href="{{ route('backoffice.homologation.equipements') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50"
                    wire:navigate>
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M14 20H10V22H8V20H5C4.44772 20 4 19.5523 4 19V16H2V14H4V10H2V8H4V5C4 4.44772 4.44772 4 5 4H8V2H10V4H14V2H16V4H19C19.5523 4 20 4.44772 20 5V8H22V10H20V14H22V16H20V19C20 19.5523 19.5523 20 19 20H16V22H14V20ZM7 7V11H11V7H7Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Equipements</span>
                </a>
                <a href="{{ route("backoffice.homologation.demandeurs") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50"
                    wire:navigate>
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M14 20H10V22H8V20H5C4.44772 20 4 19.5523 4 19V16H2V14H4V10H2V8H4V5C4 4.44772 4.44772 4 5 4H8V2H10V4H14V2H16V4H19C19.5523 4 20 4.44772 20 5V8H22V10H20V14H22V16H20V19C20 19.5523 19.5523 20 19 20H16V22H14V20ZM7 7V11H11V7H7Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Demandeurs</span>
                </a>
                <a href="{{ route("backoffice.homologation.categories") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50"
                    wire:navigate>
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Catégories</span>
                </a>
                <a href="{{ route("backoffice.homologation.marques") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50"
                    wire:navigate>
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M5 2H19C19.5523 2 20 2.44772 20 3V22.1433C20 22.4194 19.7761 22.6434 19.5 22.6434C19.4061 22.6434 19.314 22.6168 19.2344 22.5669L12 18.0313L4.76559 22.5669C4.53163 22.7136 4.22306 22.6429 4.07637 22.4089C4.02647 22.3293 4 22.2373 4 22.1433V3C4 2.44772 4.44772 2 5 2Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Marques</span>
                </a>
                <a href="{{ route("backoffice.homologation.dossiers") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50"
                    wire:navigate>
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM11 7V9H13V7H11ZM11 11V17H13V11H11Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Dossiers</span>
                </a>
                <a href="{{ route("backoffice.homologation.certificats") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50"
                    wire:navigate>
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20.9998 7L16 2H3.9985C3.44749 2 3 2.44405 3 2.9918V21.0082C3 21.5447 3.44476 22 3.9934 22H12.3414C12.1203 21.3744 12 20.7013 12 20C12 16.6863 14.6863 14 18 14C19.0928 14 20.1174 14.2922 20.9999 14.8026L20.9998 7ZM14.4646 19.4647L18.0001 23.0002L22.9498 18.0505L21.5356 16.6362L18.0001 20.1718L15.8788 18.0505L14.4646 19.4647Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Certificats délivrés</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M22 20H2V18H3V11.0314C3 6.04348 7.02944 2 12 2C16.9706 2 21 6.04348 21 11.0314V18H22V20ZM9.5 21H14.5C14.5 22.3807 13.3807 23.5 12 23.5C10.6193 23.5 9.5 22.3807 9.5 21Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Notifications</span>
                    <span
                        class="inline-flex rounded-full border border-red-200 bg-red-100 px-1.5 py-0.5 text-xs leading-4 font-semibold text-red-700 dark:border-red-700 dark:bg-red-700 dark:text-red-50">3</span>
                </a>
            @endhasrole
        </nav>
    </div>
</div>


<!-- Profil -->
<div class="flex flex-none items-center border-t border-gray-100 p-4 dark:border-gray-800/75">
    <div class="relative w-full">
        <button x-on:click="userDropdownOpen = true" x-bind:aria-expanded="userDropdownOpen" type="button"
            id="tk-dropdown-layouts-user"
            class="group relative inline-flex w-full items-center justify-between gap-2 rounded-lg px-2.5 py-1.5 text-sm leading-5 text-gray-800 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white"
            aria-haspopup="true">
            <span
                class="absolute inset-0 scale-50 rounded-lg bg-gray-100 opacity-0 transition ease-out group-hover:scale-100 group-hover:opacity-100 group-active:scale-105 group-active:bg-gray-200 dark:bg-gray-700/50 dark:group-active:bg-gray-700/75"></span>
            <span class="relative inline-flex items-center gap-2">
                <span class="relative inline-block flex-none">
                    <span class="absolute top-0 right-0 -mt-1 -mr-1 size-3 rounded-full border-2 border-white bg-green-500"></span>
                    @if (Auth::user()->photo)
                        <img src="{{ Auth::user()->photoURL() }}"
                            alt="{{ Auth::user()->last_name . ' ' . Auth::user()->first_name }}"
                            class="inline-block size-8 rounded-lg" />
                    @else
                        <img src="{{ asset('logo/anonymous.jpg') }}"
                            class="inline-block size-10 rounded-full" />
                    @endif
                </span>
                <span class="flex grow flex-col text-left">
                    <span class="w-40 truncate text-sm font-semibold">
                        {{ Auth::user()->last_name." ".Auth::user()->first_name  }}
                    </span>
                    <span class="w-40 truncate text-xs font-medium text-gray-500 dark:text-gray-400">
                        {{ Auth::user()->email }}
                    </span>
                </span>
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                class="hi-micro hi-ellipsis-horizontal relative inline-block size-4 flex-none opacity-50">
                <path
                    d="M2 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM6.5 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM12.5 6.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
            </svg>
        </button>

        <div x-cloak x-trap="userDropdownOpen" x-show="userDropdownOpen"
            x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
            x-on:click.outside="userDropdownOpen = false" x-on:keydown.down.prevent="$focus.next()"
            x-on:keydown.up.prevent="$focus.prev()" x-on:keydown.home.prevent="$focus.first()"
            x-on:keydown.end.prevent="$focus.last()" x-on:keydown.escape.window="userDropdownOpen = false"
            role="menu" aria-labelledby="tk-dropdown-layouts-user"
            class="absolute right-0 bottom-full left-0 z-10 mb-1 origin-bottom rounded-lg shadow-xl shadow-gray-500/10 dark:shadow-gray-900">
            <div
                class="divide-y divide-gray-100 rounded-lg bg-white ring-1 ring-black/5 dark:divide-gray-700 dark:bg-gray-800 dark:ring-gray-700">
                <div class="space-y-1 p-2.5">
                    <a role="menuitem" href="#"
                        class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                        <i
                            class="ri-settings-2-line inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"></i>
                        <span class="grow py-1.5">Paramètres</span>
                    </a>
                </div>
                <div class="space-y-1 p-2.5">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" role="menuitem"
                            class="group flex w-full items-center gap-2.5 rounded-lg px-2.5 text-left text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                            <i
                                class="ri-logout-box-line inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"></i>
                            <span class="grow py-1.5">Se déconnecter</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
