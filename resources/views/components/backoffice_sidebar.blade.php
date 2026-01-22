<!-- Sidebar Header -->
<div class="flex h-16 flex-none items-center justify-between border-b border-gray-100 px-4 dark:border-gray-700/75">
    <!-- Brand -->
    <a href="#">
        <img src="{{ asset("logo/anrtic.png") }}" alt="anrtic-logo" width="100" height="100"/>
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


<!-- Sidebar Content -->
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
                <a href="{{ route("backoffice.webmasters") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.partenaires', 'backoffice.partenaires.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Administrateurs web</span>
                </a>
            @endhasrole

            @hasrole('WEB_MASTER')
                <h4 class="mx-2.5 pt-2 pb-2 text-sm font-semibold text-black dark:text-white">
                    Gestion
                </h4>
                <a href="{{ route('backoffice.articles') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.articles', 'backoffice.articles.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.articles', 'backoffice.articles.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Articles</span>
                </a>
                <a href="{{ route('backoffice.communiques') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.communiques', 'backoffice.communiques.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.communiques', 'backoffice.communiques.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 10.063V4C21 3.44772 20.5523 3 20 3H19C17.0214 4.97864 13.3027 6.08728 11 6.61281V17.3872C13.3027 17.9127 17.0214 19.0214 19 21H20C20.5523 21 21 20.5523 21 20V13.937C21.8626 13.715 22.5 12.9319 22.5 12 22.5 11.0681 21.8626 10.285 21 10.063ZM5 7C3.89543 7 3 7.89543 3 9V15C3 16.1046 3.89543 17 5 17H6L7 22H9V7H5Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Communiqués</span>
                </a>
                <a href="{{ route('backoffice.evenements') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.evenements') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.evenements') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM11 11H13V13H11V11ZM16 11H18V13H16V11Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Evènements</span>
                </a>
                <a href="{{ route('backoffice.partenaires') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.partenaires', 'backoffice.partenaires.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.partenaires', 'backoffice.partenaires.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M19.2914 5.99994H20.0002C20.5525 5.99994 21.0002 6.44766 21.0002 6.99994V13.9999C21.0002 14.5522 20.5525 14.9999 20.0002 14.9999H18.0002L13.8319 9.16427C13.3345 8.46797 12.4493 8.16522 11.6297 8.41109L9.14444 9.15668C8.43971 9.3681 7.6758 9.17551 7.15553 8.65524L6.86277 8.36247C6.41655 7.91626 6.49011 7.17336 7.01517 6.82332L12.4162 3.22262C13.0752 2.78333 13.9312 2.77422 14.5994 3.1994L18.7546 5.8436C18.915 5.94571 19.1013 5.99994 19.2914 5.99994ZM5.02708 14.2947L3.41132 15.7085C2.93991 16.1209 2.95945 16.8603 3.45201 17.2474L8.59277 21.2865C9.07284 21.6637 9.77592 21.5264 10.0788 20.9963L10.7827 19.7645C11.2127 19.012 11.1091 18.0682 10.5261 17.4269L7.82397 14.4545C7.09091 13.6481 5.84722 13.5771 5.02708 14.2947ZM7.04557 5H3C2.44772 5 2 5.44772 2 6V13.5158C2 13.9242 2.12475 14.3173 2.35019 14.6464C2.3741 14.6238 2.39856 14.6015 2.42357 14.5796L4.03933 13.1658C5.47457 11.91 7.65103 12.0343 8.93388 13.4455L11.6361 16.4179C12.6563 17.5401 12.8376 19.1918 12.0851 20.5087L11.4308 21.6538C11.9937 21.8671 12.635 21.819 13.169 21.4986L17.5782 18.8531C18.0786 18.5528 18.2166 17.8896 17.8776 17.4146L12.6109 10.0361C12.4865 9.86205 12.2652 9.78636 12.0603 9.84783L9.57505 10.5934C8.34176 10.9634 7.00492 10.6264 6.09446 9.7159L5.80169 9.42313C4.68615 8.30759 4.87005 6.45035 6.18271 5.57524L7.04557 5Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Partenaires</span>
                </a>
                <a href="{{ route('backoffice.operateurs') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.operateurs', 'backoffice.operateurs.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.operateurs', 'backoffice.operateurs.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M5.23379 7.72989C6.65303 5.48625 9.15342 4 12.0002 4C14.847 4 17.3474 5.48625 18.7667 7.72989L20.4569 6.66071C18.6865 3.86199 15.5612 2 12.0002 2C8.43928 2 5.31393 3.86199 3.54356 6.66071L5.23379 7.72989ZM12.0002 20C9.15342 20 6.65303 18.5138 5.23379 16.2701L3.54356 17.3393C5.31393 20.138 8.43928 22 12.0002 22C15.5612 22 18.6865 20.138 20.4569 17.3393L18.7667 16.2701C17.3474 18.5138 14.847 20 12.0002 20ZM12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12ZM12 13C14.2091 13 16 14.7909 16 17H8C8 14.7909 9.79086 13 12 13ZM6 12C6 13.6569 4.65685 15 3 15C1.34315 15 0 13.6569 0 12C0 10.3431 1.34315 9 3 9C4.65685 9 6 10.3431 6 12ZM21 15C22.6569 15 24 13.6569 24 12C24 10.3431 22.6569 9 21 9C19.3431 9 18 10.3431 18 12C18 13.6569 19.3431 15 21 15Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Opérateurs</span>
                </a>

                <h4 class="mx-2.5 pt-6 pb-2 text-sm font-semibold text-black dark:text-white">
                    Informations
                </h4>
                <a href="{{ route("backoffice.chiffres-secteur") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.chiffres-secteur', 'backoffice.chiffres-secteur.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.chiffres-secteur', 'backoffice.chiffres-secteur.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 12H7V21H3V12ZM17 8H21V21H17V8ZM10 2H14V21H10V2Z"></path>
                    </svg>
                    <span class="grow py-1.5">Chiffres du secteur</span>
                </a>
                <a href="{{ route("backoffice.flashinfos") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.flashinfos', 'backoffice.flashinfos.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.flashinfos', 'backoffice.flashinfos.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12.8659 3.00017L22.3922 19.5002C22.6684 19.9785 22.5045 20.5901 22.0262 20.8662C21.8742 20.954 21.7017 21.0002 21.5262 21.0002H2.47363C1.92135 21.0002 1.47363 20.5525 1.47363 20.0002C1.47363 19.8246 1.51984 19.6522 1.60761 19.5002L11.1339 3.00017C11.41 2.52187 12.0216 2.358 12.4999 2.63414C12.6519 2.72191 12.7782 2.84815 12.8659 3.00017ZM10.9999 16.0002V18.0002H12.9999V16.0002H10.9999ZM10.9999 9.00017V14.0002H12.9999V9.00017H10.9999Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Flash infos</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Messages</span>
                </a>
                <a href="{{ route("backoffice.appeloffres") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.appeloffres', 'backoffice.appeloffres.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.appeloffres', 'backoffice.appeloffres.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M10.0357 7.69802C8.38492 9.55932 6.5134 12.2442 4.89465 15.4817C4.64766 15.9757 4.04698 16.1759 3.55301 15.9289C3.05903 15.6819 2.8588 15.0812 3.10579 14.5873C4.79739 11.2041 6.76494 8.37171 8.53943 6.37095C9.4251 5.37234 10.2797 4.56162 11.0449 3.99131C11.4272 3.7063 11.8049 3.46806 12.1677 3.29756C12.5193 3.13234 12.921 3 13.3336 3C13.5496 3 13.7872 3.0535 14.007 3.19476C14.2233 3.33371 14.3629 3.51925 14.4495 3.69083C14.6066 4.00215 14.624 4.33473 14.6201 4.55938C14.6118 5.03651 14.4847 5.6328 14.3216 6.23975C13.9874 7.48318 13.3994 9.13104 12.8149 10.7577L12.7329 10.9858C12.1671 12.5598 11.6101 14.1093 11.248 15.3466C11.1505 15.68 11.0706 15.9792 11.0094 16.2414C11.7035 15.6835 12.5581 14.8454 13.466 13.9534L13.4956 13.9243C14.3772 13.0581 15.3098 12.1418 16.0967 11.5127C16.4872 11.2006 16.9082 10.904 17.3138 10.7322C17.6544 10.5878 18.4343 10.3532 19.0407 10.9596C19.4251 11.344 19.5318 11.8438 19.5594 12.2164C19.5883 12.6064 19.5429 13.0267 19.4725 13.4261C19.3315 14.2258 19.0483 15.159 18.7894 16.0009L18.7478 16.136C18.5165 16.8874 18.3102 17.5577 18.1926 18.0965C18.4529 17.8352 18.7734 17.4216 19.1475 16.811C19.436 16.34 20.0517 16.1921 20.5226 16.4806C20.9935 16.7691 21.1414 17.3848 20.8529 17.8557C20.3099 18.7422 19.748 19.4622 19.1519 19.9092C18.5283 20.377 17.7121 20.6407 16.8863 20.2278C16.2779 19.9235 16.1398 19.3173 16.1091 18.9819C16.0759 18.6192 16.1284 18.2233 16.1979 17.8667C16.3288 17.1944 16.5829 16.3698 16.823 15.5907L16.8777 15.4129C17.1447 14.5451 17.3873 13.734 17.5028 13.0789C17.5117 13.0284 17.5196 12.9802 17.5266 12.9341C17.4697 12.977 17.4094 13.0239 17.3455 13.0749C16.6477 13.6328 15.785 14.4788 14.8677 15.38L14.8381 15.4091C13.9566 16.2752 13.024 17.1915 12.2371 17.8206C11.8466 18.1328 11.4255 18.4293 11.02 18.6012C10.6794 18.7455 9.89947 18.9801 9.29311 18.3738C8.9843 18.065 8.9052 17.6753 8.87972 17.4382C8.8515 17.1755 8.86901 16.8971 8.90269 16.6351C8.9706 16.1069 9.12934 15.4656 9.32855 14.7849C9.70829 13.4872 10.2842 11.8852 10.8411 10.3362L10.9327 10.0814C11.5263 8.42931 12.082 6.8674 12.3901 5.72074C12.4172 5.61968 12.4418 5.52435 12.4638 5.43468C12.3924 5.48361 12.3178 5.53695 12.2401 5.59489C11.6173 6.05907 10.8627 6.76559 10.0357 7.69802Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Appels d'offres</span>
                </a>
                <a href="{{ route("backoffice.rapports") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.rapports', 'backoffice.rapports.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.rapports', 'backoffice.rapports.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M2 12H4V21H2V12ZM5 14H7V21H5V14ZM16 8H18V21H16V8ZM19 10H21V21H19V10ZM9 2H11V21H9V2ZM12 4H14V21H12V4Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Les rapports</span>
                </a>
                <a href="{{ route("backoffice.etudes-enquetes") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.etudes-enquetes', 'backoffice.etudes-enquetes.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.etudes-enquetes', 'backoffice.etudes-enquetes.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Etudes & enquêtes</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM12.1779 7.17624C11.8055 7.06167 11.41 7 11 7C8.79086 7 7 8.79086 7 11C7 13.2091 8.79086 15 11 15C13.2091 15 15 13.2091 15 11C15 10.59 14.9383 10.1945 14.8238 9.82212C14.5102 10.5166 13.8115 11 13 11C11.8954 11 11 10.1046 11 9C11 8.18846 11.4834 7.48982 12.1779 7.17624Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Observatoires</span>
                </a>

                <h4 class="mx-2.5 pt-6 pb-2 text-sm font-semibold text-black dark:text-white">
                    Régulation
                </h4>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M14.0049 20.0028V22.0028H2.00488V20.0028H14.0049ZM14.5907 0.689087L22.3688 8.46726L20.9546 9.88147L19.894 9.52792L17.4191 12.0028L23.076 17.6597L21.6617 19.0739L16.0049 13.417L13.6007 15.8212L13.8836 16.9525L12.4693 18.3668L4.69117 10.5886L6.10539 9.17437L7.23676 9.45721L13.53 3.16396L13.1765 2.1033L14.5907 0.689087Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Contentieux</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12.998 2V3H19.998V5H12.998V19H16.998V21H6.99805V19H10.998V5H3.99805V3H10.998V2H12.998ZM4.99805 6.34315L7.82647 9.17157C8.55033 9.89543 8.99805 10.8954 8.99805 12C8.99805 14.2091 7.20719 16 4.99805 16C2.78891 16 0.998047 14.2091 0.998047 12C0.998047 10.8954 1.44576 9.89543 2.16962 9.17157L4.99805 6.34315ZM18.998 6.34315L21.8265 9.17157C22.5503 9.89543 22.998 10.8954 22.998 12C22.998 14.2091 21.2072 16 18.998 16C16.7889 16 14.998 14.2091 14.998 12C14.998 10.8954 15.4458 9.89543 16.1696 9.17157L18.998 6.34315ZM18.998 9.17157L17.5838 10.5858C17.2099 10.9597 16.998 11.4606 16.998 12L20.998 12.001C20.998 11.4606 20.7862 10.9597 20.4123 10.5858L18.998 9.17157ZM4.99805 9.17157L3.58383 10.5858C3.20988 10.9597 2.99805 11.4606 2.99805 12L6.99805 12.001C6.99805 11.4606 6.78621 10.9597 6.41226 10.5858L4.99805 9.17157Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Cadre législatif</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M7.78428 14L8.2047 10H4V8H8.41491L8.94043 3H10.9514L10.4259 8H14.4149L14.9404 3H16.9514L16.4259 8H20V10H16.2157L15.7953 14H20V16H15.5851L15.0596 21H13.0486L13.5741 16H9.58509L9.05957 21H7.04855L7.57407 16H4V14H7.78428ZM9.7953 14H13.7843L14.2047 10H10.2157L9.7953 14Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Numérotations</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M18.364 18.3641C21.8787 14.8493 21.8787 9.15086 18.364 5.63614L19.7782 4.22192C24.0739 8.51769 24.0739 15.4825 19.7782 19.7783L18.364 18.3641ZM5.63604 5.63614C2.12132 9.15086 2.12132 14.8493 5.63604 18.3641L4.22183 19.7783C-0.0739417 15.4825 -0.0739417 8.51769 4.22183 4.22192L5.63604 5.63614ZM15.5355 15.5355C17.4882 13.5829 17.4882 10.4171 15.5355 8.46445L16.9497 7.05024C19.6834 9.78391 19.6834 14.2161 16.9497 16.9497L15.5355 15.5355ZM8.46447 8.46445C6.51184 10.4171 6.51184 13.5829 8.46447 15.5355L7.05025 16.9497C4.31658 14.2161 4.31658 9.78391 7.05025 7.05024L8.46447 8.46445ZM12 14.0001C13.1046 14.0001 14 13.1046 14 12.0001C14 10.8955 13.1046 10.0001 12 10.0001C10.8954 10.0001 10 10.8955 10 12.0001C10 13.1046 10.8954 14.0001 12 14.0001Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Radiocommunications</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 1L15 6H13V13.381L16 11.882L15.999 11H15V7H19V11H17.999L18 13.118L13 15.618L13.0009 17.171C14.1656 17.5831 15 18.6941 15 20C15 21.6569 13.6569 23 12 23C10.3431 23 9 21.6569 9 20C9 18.813 9.68934 17.7871 10.6895 17.3006L6 14L5.99892 11.7318C5.40172 11.3858 5 10.7398 5 10C5 8.89543 5.89543 8 7 8C8.10457 8 9 8.89543 9 10C9 10.7403 8.59783 11.3866 8.00007 11.7324L8 13L11 15.086V6H9L12 1Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Secteur des TIC</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M6 4V8H18V4H20.0066C20.5552 4 21 4.44495 21 4.9934V21.0066C21 21.5552 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5551 3 21.0066V4.9934C3 4.44476 3.44495 4 3.9934 4H6ZM9 17H7V19H9V17ZM9 14H7V16H9V14ZM9 11H7V13H9V11ZM16 2V6H8V2H16Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Formulaires</span>
                </a>

                <h4 class="mx-2.5 pt-6 pb-2 text-sm font-semibold text-black dark:text-white">
                    Textes
                </h4>
                <a href="{{ route('backoffice.avis-decisions') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.avis-decisions', 'backoffice.avis-decisions.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.avis-decisions', 'backoffice.avis-decisions.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20.9998 7L16 2H3.9985C3.44749 2 3 2.44405 3 2.9918V21.0082C3 21.5447 3.44476 22 3.9934 22H12.3414C12.1203 21.3744 12 20.7013 12 20C12 16.6863 14.6863 14 18 14C19.0928 14 20.1174 14.2922 20.9999 14.8026L20.9998 7ZM14.4646 19.4647L18.0001 23.0002L22.9498 18.0505L21.5356 16.6362L18.0001 20.1718L15.8788 18.0505L14.4646 19.4647Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Avis & décisions</span>
                </a>
                <a href="{{ route('backoffice.lois') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.lois', 'backoffice.lois.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.lois', 'backoffice.lois.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12.998 2V3H19.998V5H12.998V19H16.998V21H6.99805V19H10.998V5H3.99805V3H10.998V2H12.998ZM4.99805 6.34315L7.82647 9.17157C8.55033 9.89543 8.99805 10.8954 8.99805 12C8.99805 14.2091 7.20719 16 4.99805 16C2.78891 16 0.998047 14.2091 0.998047 12C0.998047 10.8954 1.44576 9.89543 2.16962 9.17157L4.99805 6.34315ZM18.998 6.34315L21.8265 9.17157C22.5503 9.89543 22.998 10.8954 22.998 12C22.998 14.2091 21.2072 16 18.998 16C16.7889 16 14.998 14.2091 14.998 12C14.998 10.8954 15.4458 9.89543 16.1696 9.17157L18.998 6.34315ZM18.998 9.17157L17.5838 10.5858C17.2099 10.9597 16.998 11.4606 16.998 12L20.998 12.001C20.998 11.4606 20.7862 10.9597 20.4123 10.5858L18.998 9.17157ZM4.99805 9.17157L3.58383 10.5858C3.20988 10.9597 2.99805 11.4606 2.99805 12L6.99805 12.001C6.99805 11.4606 6.78621 10.9597 6.41226 10.5858L4.99805 9.17157Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Les lois</span>
                </a>
                <a href="{{ route('backoffice.arretes') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.arretes', 'backoffice.arretes.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.arretes', 'backoffice.arretes.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Les arrêtés</span>
                </a>
                <a href="{{ route('backoffice.decrets') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.decrets', 'backoffice.decrets.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.decrets', 'backoffice.decrets.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Les décrets</span>
                </a>
                <a href="{{ route('backoffice.notes_service') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.notes_service', 'backoffice.notes_service.*') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.notes_service', 'backoffice.notes_service.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Notes de service</span>
                </a>

                <h4 class="mx-2.5 pt-6 pb-2 text-sm font-semibold text-black dark:text-white">
                    Pages
                </h4>
                <a href="{{ route('backoffice.motDG') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.motDG') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.motDG') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Mot du DG</span>
                </a>
                <a href="{{ route('backoffice.organigramme') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.organigramme') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.organigramme') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M7.10508 8.78991C7.45179 10.0635 8.61653 11 10 11H14C16.4703 11 18.5222 12.7915 18.9274 15.1461C20.1303 15.5367 21 16.6668 21 18C21 19.6569 19.6569 21 18 21C16.3431 21 15 19.6569 15 18C15 16.7334 15.7849 15.6501 16.8949 15.2101C16.5482 13.9365 15.3835 13 14 13H10C8.87439 13 7.83566 12.6281 7 12.0004V15.1707C8.16519 15.5825 9 16.6938 9 18C9 19.6569 7.65685 21 6 21C4.34315 21 3 19.6569 3 18C3 16.6938 3.83481 15.5825 5 15.1707V8.82929C3.83481 8.41746 3 7.30622 3 6C3 4.34315 4.34315 3 6 3C7.65685 3 9 4.34315 9 6C9 7.26661 8.21506 8.34988 7.10508 8.78991Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Organigramme</span>
                </a>
                <a href="{{ route('backoffice.planStrategique') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.planStrategique') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.planStrategique') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M2 5L9 2L15 5L21.303 2.2987C21.5569 2.18992 21.8508 2.30749 21.9596 2.56131C21.9862 2.62355 22 2.69056 22 2.75827V19L15 22L9 19L2.69696 21.7013C2.44314 21.8101 2.14921 21.6925 2.04043 21.4387C2.01375 21.3765 2 21.3094 2 21.2417V5ZM15 19.7639V7.17594L14.9352 7.20369L9 4.23607V16.8241L9.06476 16.7963L15 19.7639Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Plan stratégique</span>
                </a>
                <a href="{{ route('backoffice.missions') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.missions') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.missions') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Missions</span>
                </a>
                <a href="{{ route('backoffice.informationUtile') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.informationUtile') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.informationUtile') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 6C12.8284 6 13.5 5.32843 13.5 4.5C13.5 3.67157 12.8284 3 12 3C11.1716 3 10.5 3.67157 10.5 4.5C10.5 5.32843 11.1716 6 12 6ZM9 10H11V18H9V20H15V18H13V8H9V10Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Information utile</span>
                </a>

                <h4 class="mx-2.5 pt-6 pb-2 text-sm font-semibold text-black dark:text-white">
                    Autres
                </h4>
                <a href="{{ route('backoffice.categories') }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.categories') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.categories', 'backoffice.categories.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M5 2H19C19.5523 2 20 2.44772 20 3V22.1433C20 22.4194 19.7761 22.6434 19.5 22.6434C19.4061 22.6434 19.314 22.6168 19.2344 22.5669L12 18.0313L4.76559 22.5669C4.53163 22.7136 4.22306 22.6429 4.07637 22.4089C4.02647 22.3293 4 22.2373 4 22.1433V3C4 2.44772 4.44772 2 5 2Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Catégories</span>
                </a>
                <a href="{{ route("backoffice.videos") }}"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium
                    {{ request()->routeIs('backoffice.videos') ? 'text-green-700 dark:text-green-400' : '' }}
                    hover:bg-gray-100/60 dark:hover:bg-gray-700/50" wire:navigate>
                    <svg class="inline-block size-4 {{ request()->routeIs('backoffice.videos', 'backoffice.videos.*') ? 'text-green-600 dark:text-green-400' : '' }} text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M3 3.9934C3 3.44476 3.44495 3 3.9934 3H20.0066C20.5552 3 21 3.44495 21 3.9934V20.0066C21 20.5552 20.5551 21 20.0066 21H3.9934C3.44476 21 3 20.5551 3 20.0066V3.9934ZM10.6219 8.41459C10.5562 8.37078 10.479 8.34741 10.4 8.34741C10.1791 8.34741 10 8.52649 10 8.74741V15.2526C10 15.3316 10.0234 15.4088 10.0672 15.4745C10.1897 15.6583 10.4381 15.708 10.6219 15.5854L15.5008 12.3328C15.5447 12.3035 15.5824 12.2658 15.6117 12.2219C15.7343 12.0381 15.6846 11.7897 15.5008 11.6672L10.6219 8.41459Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Vidéos</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2.5 rounded-lg px-2.5 text-sm font-medium hover:bg-gray-100/60 dark:hover:bg-gray-700/50">
                    <svg class="inline-block size-4 text-gray-400 flex-none group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918ZM20 15V5H4V19L14 9L20 15ZM20 17.8284L14 11.8284L6.82843 19H20V17.8284ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                        </path>
                    </svg>
                    <span class="grow py-1.5">Gallérie</span>
                </a>
            @endhasrole
        </nav>
    </div>
</div>


<!-- Sidebar Footer -->
<div class="flex flex-none items-center border-t border-gray-100 p-4 dark:border-gray-800/75">
    <!-- User Dropdown -->
    <div class="relative w-full">
        <!-- Dropdown Toggle Button -->
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
        <!-- END Dropdown Toggle Button -->

        <!-- Dropdown -->
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
        <!-- END Dropdown -->
    </div>
    <!-- END User Dropdown -->
</div>
