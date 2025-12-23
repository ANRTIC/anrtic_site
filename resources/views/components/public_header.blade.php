<div
    id="page-header"
    class="z-1 flex flex-none items-center bg-gray-100 shadow-xs"
>
    <div class="container mx-auto px-4 lg:px-8 xl:max-w-7xl">
        <div class="flex justify-between py-4">
            <!-- Logo -->
            <div class="flex items-center gap-2 lg:gap-6">
                <a href="{{ route("accueil") }}">
                    <img class="w-32 h-auto" src="{{ asset("logo/anrtic.png") }}" alt="logo-ANRTIC" />
                </a>
            </div>

            <!-- Drapeau -->
            <div class="flex items-center gap-2">
                <svg 
                    class="inline-block size-10"
                    xmlns="http://www.w3.org/2000/svg" 
                    xmlns:xlink="http://www.w3.org/1999/xlink" 
                    viewBox="0 0 500 300"
                >
                    <path fill="#3A75C4" d="M0 0h500v300H0z"/><path fill="#CE1126" d="M0 0h500v225H0z"/><path fill="#FFF" d="M0 0h500v150H0z"/><path fill="#FFC61E" d="M0 0h500v75H0z"/><path fill="#3D8E33" d="M0 300l250-150L0 0v300z"/><circle fill="#FFF" cx="85" cy="150" r="67.5"/><circle fill="#3D8E33" cx="115" cy="150" r="67.5"/><path id="a" fill="#FFF" d="M100.01 89.2l7.36 22.588-19.258-13.949h23.776L92.63 111.788l7.38-22.588z"/><use xlink:href="#a" y="32.208"/><use xlink:href="#a" y="64.417"/><use xlink:href="#a" y="96.625"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<header x-data="{ mobileNavOpen: false }" id="page-header" class="relative flex flex-none items-center py-8 bg-green-700">
    <div class="relative container mx-auto flex items-center justify-between px-4 lg:px-8 xl:max-w-7xl">
        <div class="flex items-center">
            <!-- Logo 
            <a href="{{ route("accueil") }}" class="group inline-flex items-center gap-2 text-lg font-bold tracking-wide text-gray-900 hover:text-gray-600 dark:text-gray-100 dark:hover:text-gray-300">
                <img src="{{ asset("logo/anrtic.png") }}" class="inline-block size-10"/>
            </a>
            -->

            <!-- Desktop menu -->
            <ul class="mt-0.5 hidden items-center lg:flex">
                <li
                    class="group [&:focus-within>div]:visible [&:focus-within>div>div]:scale-100 [&:focus-within>div>div]:opacity-100 [&:focus-within>div>div>div]:scale-100 [&:focus-within>div>div>div]:opacity-100">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 pr-4 text-sm font-semibold text-white group-hover:text-gray-200 dark:text-gray-100 dark:group-hover:text-green-400"
                        onclick="this.blur()"
                    >
                        L'ANRTIC
                        <i class="ri-arrow-drop-down-line inline-block size-4 opacity-50"></i>
                    </button>

                    <div class="invisible absolute top-4 right-8 left-8 z-1 w-80 pt-8 group-hover:visible">
                        <div
                            class="origin-top scale-90 overflow-hidden rounded-lg bg-white opacity-0 shadow-xl ring-1 ring-black/5 transition duration-300 ease-out group-hover:scale-100 group-hover:opacity-100 dark:bg-gray-800 dark:ring-white/10">
                            <div class="grid scale-95 grid-cols-1 opacity-0 transition duration-500 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <div class="space-y-6 p-8">
                                    <nav class="flex flex-col gap-3">
                                        <a href="{{ route("anrtic.motDG") }}"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Mot du directeur général
                                        </a>
                                        <a href="{{ route("anrtic.organigramme") }}"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Organigramme
                                        </a>
                                        <a href="{{ route("anrtic.planStrategique") }}"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Plan stratégique
                                        </a>
                                        <a href="{{ route("anrtic.missions") }}"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Nos missions
                                        </a>
                                        <a href="{{ route("anrtic.informationsUtiles") }}"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Informations utiles
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="group [&:focus-within>div]:visible [&:focus-within>div>div]:scale-100 [&:focus-within>div>div]:opacity-100 [&:focus-within>div>div>div]:scale-100 [&:focus-within>div>div>div]:opacity-100">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 pr-4 text-sm font-semibold text-white group-hover:text-gray-200 dark:text-gray-100 dark:group-hover:text-green-400"
                        onclick="this.blur()"
                    >
                        Actualités
                        <i class="ri-arrow-down-s-line inline-block size-4 opacity-50"></i>
                    </button>

                    <div class="invisible absolute top-4 right-8 left-8 z-1 ml-20 w-80 pt-8 group-hover:visible">
                        <div
                            class="origin-top scale-90 overflow-hidden rounded-lg bg-white opacity-0 shadow-xl ring-1 ring-black/5 transition duration-300 ease-out group-hover:scale-100 group-hover:opacity-100 dark:bg-gray-800 dark:ring-white/10">
                            <div class="grid scale-95 grid-cols-1 opacity-0 transition duration-500 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <div class="space-y-6 p-8">
                                    <nav x-data="{ openPublicationsMenu: false }" class="flex flex-col gap-3">
                                        <div @click="openPublicationsMenu = !openPublicationsMenu"
                                            class="flex justify-between text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            <a href="#" class="text-sm font-medium">
                                                Publications 
                                            </a>
                                            <i class="ri-arrow-drop-down-line"></i>
                                        </div>
                                        <nav x-data="{ openGalleryMenu: false }" x-show="openPublicationsMenu" 
                                            x-transition:enter="transition duration-300 ease-out"
                                            x-transition:leave="transition duration-300 ease-in"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-95"
                                            class="flex flex-col gap-3 ml-10">
                                            <div @click="openGalleryMenu = !openGalleryMenu"
                                                class="flex justify-between text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                <a href="#" class="text-sm font-medium">
                                                    Gallérie 
                                                </a>
                                                <i class="ri-arrow-drop-down-line"></i>
                                            </div>
                                            <nav x-show="openGalleryMenu" 
                                                x-transition:enter="transition duration-300 ease-out"
                                                x-transition:leave="transition duration-300 ease-in"
                                                x-transition:enter-start="opacity-0 scale-95"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0 scale-95" 
                                                class="flex flex-col gap-3 ml-10">
                                                <a href="#"
                                                    class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                    Photothèque
                                                </a>
                                                 <a href="#"
                                                    class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                    Vidéothèque
                                                </a>
                                            </nav>
                                            <a href="#"
                                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                Etudes et enquêtes
                                            </a>
                                            <a href="#"
                                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                Rapports
                                            </a>
                                            <a href="#"
                                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                Appels d'offres
                                            </a>
                                        </nav>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Articles
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Communiqués
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Agenda et évènements
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="group [&:focus-within>div]:visible [&:focus-within>div>div]:scale-100 [&:focus-within>div>div]:opacity-100 [&:focus-within>div>div>div]:scale-100 [&:focus-within>div>div>div]:opacity-100">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 pr-4 text-sm font-semibold text-white group-hover:text-gray-200 dark:text-gray-100 dark:group-hover:text-green-400"
                        onclick="this.blur()"
                    >
                        Observatoires
                        <i class="ri-arrow-drop-down-line inline-block size-4 opacity-50"></i>
                    </button>

                    <div class="invisible absolute top-4 right-8 left-8 z-1 ml-40 w-80 pt-8 group-hover:visible">
                        <div
                            class="origin-top scale-90 overflow-hidden rounded-lg bg-white opacity-0 shadow-xl ring-1 ring-black/5 transition duration-300 ease-out group-hover:scale-100 group-hover:opacity-100 dark:bg-gray-800 dark:ring-white/10">
                            <div
                                class="grid scale-95 grid-cols-1 opacity-0 transition duration-500 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <div class="space-y-6 p-8">
                                    <nav class="flex flex-col gap-3">
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Qualité de service
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Téléphone mobile
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Téléphone fixe
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Internet
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="group [&:focus-within>div]:visible [&:focus-within>div>div]:scale-100 [&:focus-within>div>div]:opacity-100 [&:focus-within>div>div>div]:scale-100 [&:focus-within>div>div>div]:opacity-100">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 pr-4 text-sm font-semibold text-white group-hover:text-gray-200 dark:text-gray-100 dark:group-hover:text-green-400"
                        onclick="this.blur()"
                    >
                        Régulation
                        <i class="ri-arrow-drop-down-line inline-block size-4 opacity-50"></i>
                    </button>

                    <div class="invisible absolute top-4 right-8 left-8 z-1 ml-80 w-80 pt-8 group-hover:visible">
                        <div
                            class="origin-top scale-90 overflow-hidden rounded-lg bg-white opacity-0 shadow-xl ring-1 ring-black/5 transition duration-300 ease-out group-hover:scale-100 group-hover:opacity-100 dark:bg-gray-800 dark:ring-white/10">
                            <div
                                class="grid scale-95 grid-cols-1 opacity-0 transition duration-500 ease-out group-hover:scale-100 group-hover:opacity-100">
                                <div class="space-y-6 p-8">
                                    <nav x-data="{ openReferenceTexts: false }" class="flex flex-col gap-3">
                                        <div @click="openReferenceTexts = !openReferenceTexts" 
                                            class="flex justify-between text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            <a href="#" class="text-sm font-medium">
                                                Textes de référence 
                                            </a>
                                            <i class="ri-arrow-drop-down-line"></i>
                                        </div>
                                        <nav x-show="openReferenceTexts" 
                                            x-transition:enter="transition duration-300 ease-out"
                                            x-transition:leave="transition duration-300 ease-in"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-95"
                                            class="flex flex-col gap-3 ml-10">
                                            <a href="{{ route("regulation.avisDecisions") }}"
                                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                Avis & décisions
                                            </a>
                                            <a href="{{ route("regulation.lois") }}"
                                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                Lois
                                            </a>
                                            <a href="{{ route("regulation.decrets") }}"
                                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                Décrets
                                            </a>
                                            <a href="{{ route("regulation.arretes") }}"
                                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                                Arrêtés
                                            </a>
                                        </nav>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Contentieux
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Cadre législatif
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Radiocommunication
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Numérotation
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Secteur des TIC
                                        </a>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                            Formulaires
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="group [&:focus-within>div]:visible [&:focus-within>div>div]:scale-100 [&:focus-within>div>div]:opacity-100 [&:focus-within>div>div>div]:scale-100 [&:focus-within>div>div>div]:opacity-100">
                    <a  href="{{ route("contact") }}"
                        class="inline-flex h-8 items-center gap-1 pr-4 text-sm font-semibold text-white group-hover:text-gray-200 dark:text-gray-100 dark:group-hover:text-green-400"
                        onclick="this.blur()"
                    >
                        Contact
                    </a>
                </li>
            </ul>
        </div>

        <div class="flex items-center">
            <div class="flex items-center justify-center gap-2">
                <!--
                <a href="#"
                    class="hidden items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none lg:inline-flex dark:border-gray-700 dark:bg-transparent dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                    <span>Sign In</span>
                </a>
                -->
                <a href="#" class="inline-flex items-center justify-center gap-2 rounded-lg border border-none bg-green-600 px-3 py-2 text-sm leading-5 font-semibold text-white hover:bg-green-900 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                    Newsletter
                    <i data-lucide="mail" class="size-5 opacity-50 sm:inline-block"></i>
                </a>
            </div>

            <!-- Mobile menu -->
            <div class="ml-3 lg:hidden">
                <button x-on:click="mobileNavOpen = true" type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-transparent dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700"
                    aria-controls="tkMobileNav">
                    <svg class="hi-mini hi-bars-3 inline-block size-5" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <!-- END Open Mobile Navigation -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Main Header Content -->

    <!-- Mobile Navigation -->
    <nav x-cloak x-show="mobileNavOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-50 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-50 translate-x-full" id="tkMobileNav"
        class="fixed top-0 right-0 bottom-0 z-50 w-80 overflow-auto bg-white/95 shadow-lg lg:hidden dark:bg-gray-800/95"
        tabindex="-1" aria-labelledby="tkMobileNavLabel" x-bind:aria-modal="mobileNavOpen ? 'true' : null"
        x-bind:role="mobileNavOpen ? 'dialog' : null">
        <div class="flex items-center justify-between p-6">
            <!-- Logo -->
            <a id="tkMobileNavLabel" href="{{ route("accueil") }}"
                class="group inline-flex items-center gap-2 text-lg font-bold tracking-wide text-gray-900 hover:text-gray-600 dark:text-gray-100 dark:hover:text-gray-300">
                <img src="{{ asset("logo/anrtic.png") }}" class="inline-block size-5"/>
            </a>
            <!-- END Logo -->

            <!-- Close Mobile Navigation -->
            <button x-on:click="mobileNavOpen = false" type="button"
                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                <svg class="hi-mini hi-x-mark -mx-0.5 inline-block size-5" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path
                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                </svg>
            </button>
            <!-- END Close Mobile Navigation -->
        </div>
        <div class="h-px bg-gray-200/75 dark:bg-gray-700/75"></div>
        <div x-data="{
                openANRTICMenu: false,
                openNewsMenu: false,
                openObservatoriesMenu: false,
                openRegulationMenu: false
            }" 
            class="flex flex-col gap-3 px-6 py-6">
            <div class="grid grid-cols-1 gap-2">
                <div class="flex justify-between">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 font-semibold group-hover:text-green-600 dark:text-gray-100 dark:group-hover:text-green-400"
                        @click="openANRTICMenu = !openANRTICMenu"
                    >
                        <span>L'ANRTIC</span>
                    </button>
                    <i class="ri-arrow-drop-down-line inline-block size-4 opacity-50"></i>
                </div>
                <div x-show="openANRTICMenu" 
                    x-transition:enter="transition duration-300 ease-out"
                    x-transition:leave="transition duration-300 ease-in"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="space-y-2">
                    <nav class="flex flex-col gap-3 ml-5">
                        <a href="{{ route("anrtic.motDG") }}"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Mot du directeur général
                        </a>
                        <a href="{{ route("anrtic.organigramme") }}"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Organigramme
                        </a>
                        <a href="{{ route("anrtic.planStrategique") }}"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Plan stratégique
                        </a>
                        <a href="{{ route("anrtic.missions") }}"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Nos missions
                        </a>
                        <a href="{{ route("anrtic.informationsUtiles") }}"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Informations utiles
                        </a>
                    </nav>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-2">
                <div class="flex justify-between">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 font-semibold group-hover:text-green-600 dark:text-gray-100 dark:group-hover:text-green-400"
                        @click="openNewsMenu = !openNewsMenu"
                    >
                        <span>Actualités</span>
                    </button>
                    <i class="ri-arrow-drop-down-line inline-block size-4 opacity-50"></i>
                </div>
                <div x-show="openNewsMenu"
                    x-transition:enter="transition duration-300 ease-out"
                    x-transition:leave="transition duration-300 ease-in"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="space-y-2">
                    <nav x-data="{ openPublicationsMenu: false }" class="flex flex-col gap-3 ml-5">
                        <div 
                            @click="openPublicationsMenu = !openPublicationsMenu"
                            class="flex justify-between text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            <a href="#" class="text-sm font-medium ">
                                Publications
                            </a>
                            <i class="ri-arrow-drop-down-line"></i>
                        </div>
                        <nav x-data="{ openGalleryMenu: false }" x-show="openPublicationsMenu" 
                            x-transition:enter="transition duration-300 ease-out"
                            x-transition:leave="transition duration-300 ease-in"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="flex flex-col gap-3 ml-10">
                            <div @click="openGalleryMenu = !openGalleryMenu"
                                class="flex justify-between text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                <a href="#" class="text-sm font-medium ">
                                    Gallérie
                                </a>
                                <i class="ri-arrow-drop-down-line"></i>
                            </div>
                            <nav 
                                x-show="openGalleryMenu" 
                                x-transition:enter="transition duration-300 ease-out"
                                x-transition:leave="transition duration-300 ease-in"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95" 
                                class="flex flex-col gap-3 ml-15">
                                <a href="#"
                                    class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                    Photothèque
                                </a>
                                <a href="#"
                                    class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                    Vidéothèque
                                </a>
                            </nav>
                            <a href="#"
                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                Etudes et enquêtes
                            </a>
                            <a href="#"
                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                Rapports
                            </a>
                            <a href="#"
                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                Appels d'offres
                            </a>
                        </nav>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Articles
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Communiqués
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Agenda et évènements
                        </a>
                    </nav>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-2">
                <div class="flex justify-between">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 font-semibold group-hover:text-green-600 dark:text-gray-100 dark:group-hover:text-green-400"
                        @click="openObservatoriesMenu = !openObservatoriesMenu"
                    >
                        <span>Observatoires</span>
                    </button>
                    <i class="ri-arrow-drop-down-line inline-block size-4 opacity-50"></i>
                </div>
                <div x-show="openObservatoriesMenu"
                    x-transition:enter="transition duration-300 ease-out"
                    x-transition:leave="transition duration-300 ease-in"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="space-y-2">
                    <nav class="flex flex-col gap-3 ml-5">
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Qualité de service
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Téléphone mobile
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Téléphone fixe
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Internet
                        </a>
                    </nav>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-2">
                <div class="flex justify-between">
                    <button type="button"
                        class="inline-flex h-8 items-center gap-1 font-semibold group-hover:text-green-600 dark:text-gray-100 dark:group-hover:text-green-400"
                        @click="
                            openRegulationMenu = !openRegulationMenu,
                            openANRTICMenu = false
                        "
                    >
                        <span>Régulation</span>
                    </button>
                    <i class="ri-arrow-drop-down-line inline-block size-4 opacity-50"></i>
                </div>
                <div x-show="openRegulationMenu"
                    x-transition:enter="transition duration-300 ease-out"
                    x-transition:leave="transition duration-300 ease-in"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="space-y-2">
                    <nav x-data="{ openReferenceTexts: false }" class="flex flex-col gap-3 ml-5">
                        <div @click="openReferenceTexts = !openReferenceTexts"
                            class="flex justify-between text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            <a href="#" class="text-sm font-medium ">
                                Textes de référence
                            </a>
                            <i class="ri-arrow-drop-down-line"></i>
                        </div>
                        <nav x-show="openReferenceTexts" 
                            x-transition:enter="transition duration-300 ease-out"
                            x-transition:leave="transition duration-300 ease-in"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="flex flex-col gap-3 ml-10">
                            <a href="{{ route("regulation.avisDecisions") }}"
                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                Avis & décisions
                            </a>
                            <a href="{{ route("regulation.lois") }}"
                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                Lois
                            </a>
                            <a href="{{ route("regulation.decrets") }}"
                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                Décrets
                            </a>
                            <a href="{{ route("regulation.arretes") }}"
                                class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                                Arrêtés
                            </a>
                        </nav>   
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Contentieux
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Cadre législatif
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Radiocommunication
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Numérotation
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Secteur des TIC
                        </a>
                        <a href="#"
                            class="text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
                            Formulaires
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <!-- END Mobile Navigation -->

    <!-- Mobile Navigation Backdrop -->
    <div x-cloak x-show="mobileNavOpen" x-on:click="mobileNavOpen = false"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-gray-900/20 backdrop-blur-xs will-change-auto lg:hidden dark:bg-gray-900/80">
    </div>
    <!-- END Mobile Navigation Backdrop -->
</header>
