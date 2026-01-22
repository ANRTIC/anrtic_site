<div class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs dark:bg-gray-800 dark:text-gray-100"
    x-data="{ open: false }">
    <!-- Statistics -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:gap-8">
        <div class="group flex col-span-full h-[33vh] flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Visites</h3>
                </div>
                <div class="flex items-center gap-1">
                    <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-transparent bg-transparent px-3 py-2 text-sm leading-5 font-semibold text-gray-700 hover:border-gray-300 hover:bg-white hover:text-gray-900 hover:shadow-sm focus:ring focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:text-gray-300 dark:hover:border-gray-600 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="hi-micro hi-ellipsis-vertical -mx-1 inline-block size-4">
                            <path
                                d="M8 2a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM8 6.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM9.5 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="rounded-lg bg-white p-4 text-sm shadow-sm h-full overflow-hidden shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <div class="flex items-center justify-between">
                    <dl>
                        <dt class="text-2xl font-bold">12500</dt>
                        <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            sur les 2 derniers mois
                        </dd>
                    </dl>
                    <div
                        class="inline-flex items-center gap-1 rounded-full bg-emerald-200 px-2 py-1 text-sm leading-4 font-semibold text-emerald-800">
                        <svg class="hi-solid hi-arrow-circle-up inline-block size-4" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>5.9%</span>
                    </div>
                </div>
                <div class="-mx-2 -mb-2">
                    <div
                        class="overflow-hidden rounded text-gray-200 transition group-hover:text-orange-200 dark:text-gray-700 dark:hover:text-orange-800">
                        <svg class="w-full" viewBox="0 0 1000 500" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M 0 495.01443789956 C 14.199999999999998 490.8291637927556 42.6 480.6248312053363 71 474.0880673655379 C 99.4 467.55130352573946 113.6 470.3498713081252 142 462.33061870056787 C 170.4 454.3113660930105 184.6 448.34097658442397 213 433.9918043277511 C 241.4 419.64263207107825 255.6 408.0392375091671 284 390.5847574172036 C 312.4 373.1302773252402 326.6 347.57436530774606 355 346.7194038679338 C 383.4 345.86444242812155 397.6 388.10689141982334 426 386.30995021814226 C 454.4 384.5130090164612 468.6 351.23637877699565 497 337.7346978595284 C 525.4 324.23301694206117 539.6 350.8881026454411 568 318.8015456308061 C 596.4 286.7149886161711 610.6 192.13889660503196 639 177.30191278635345 C 667.4 162.46492896767495 681.6 233.96915498419335 710 244.61662653741365 C 738.4 255.26409809063395 752.6 234.8754831280235 781 230.53927055245492 C 809.4 226.20305797688636 823.6 248.13926238288883 852 222.9355636595708 C 880.4 197.73186493625275 894.6 109.83549866599051 923 104.52077693586472 C 951.4 99.20605520573892 979.8 177.9937193943264 994 196.36195500894183 L 1000 500 L 0 500Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $articles }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Articles
                    </dd>
                </dl>
                <div class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $communiques }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Communiqués
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 10.063V4C21 3.44772 20.5523 3 20 3H19C17.0214 4.97864 13.3027 6.08728 11 6.61281V17.3872C13.3027 17.9127 17.0214 19.0214 19 21H20C20.5523 21 21 20.5523 21 20V13.937C21.8626 13.715 22.5 12.9319 22.5 12 22.5 11.0681 21.8626 10.285 21 10.063ZM5 7C3.89543 7 3 7.89543 3 9V15C3 16.1046 3.89543 17 5 17H6L7 22H9V7H5Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $evenements }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Evènements
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM11 11H13V13H11V11ZM16 11H18V13H16V11Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $appels_offres }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Appels d'offres
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M10.0357 7.69802C8.38492 9.55932 6.5134 12.2442 4.89465 15.4817C4.64766 15.9757 4.04698 16.1759 3.55301 15.9289C3.05903 15.6819 2.8588 15.0812 3.10579 14.5873C4.79739 11.2041 6.76494 8.37171 8.53943 6.37095C9.4251 5.37234 10.2797 4.56162 11.0449 3.99131C11.4272 3.7063 11.8049 3.46806 12.1677 3.29756C12.5193 3.13234 12.921 3 13.3336 3C13.5496 3 13.7872 3.0535 14.007 3.19476C14.2233 3.33371 14.3629 3.51925 14.4495 3.69083C14.6066 4.00215 14.624 4.33473 14.6201 4.55938C14.6118 5.03651 14.4847 5.6328 14.3216 6.23975C13.9874 7.48318 13.3994 9.13104 12.8149 10.7577L12.7329 10.9858C12.1671 12.5598 11.6101 14.1093 11.248 15.3466C11.1505 15.68 11.0706 15.9792 11.0094 16.2414C11.7035 15.6835 12.5581 14.8454 13.466 13.9534L13.4956 13.9243C14.3772 13.0581 15.3098 12.1418 16.0967 11.5127C16.4872 11.2006 16.9082 10.904 17.3138 10.7322C17.6544 10.5878 18.4343 10.3532 19.0407 10.9596C19.4251 11.344 19.5318 11.8438 19.5594 12.2164C19.5883 12.6064 19.5429 13.0267 19.4725 13.4261C19.3315 14.2258 19.0483 15.159 18.7894 16.0009L18.7478 16.136C18.5165 16.8874 18.3102 17.5577 18.1926 18.0965C18.4529 17.8352 18.7734 17.4216 19.1475 16.811C19.436 16.34 20.0517 16.1921 20.5226 16.4806C20.9935 16.7691 21.1414 17.3848 20.8529 17.8557C20.3099 18.7422 19.748 19.4622 19.1519 19.9092C18.5283 20.377 17.7121 20.6407 16.8863 20.2278C16.2779 19.9235 16.1398 19.3173 16.1091 18.9819C16.0759 18.6192 16.1284 18.2233 16.1979 17.8667C16.3288 17.1944 16.5829 16.3698 16.823 15.5907L16.8777 15.4129C17.1447 14.5451 17.3873 13.734 17.5028 13.0789C17.5117 13.0284 17.5196 12.9802 17.5266 12.9341C17.4697 12.977 17.4094 13.0239 17.3455 13.0749C16.6477 13.6328 15.785 14.4788 14.8677 15.38L14.8381 15.4091C13.9566 16.2752 13.024 17.1915 12.2371 17.8206C11.8466 18.1328 11.4255 18.4293 11.02 18.6012C10.6794 18.7455 9.89947 18.9801 9.29311 18.3738C8.9843 18.065 8.9052 17.6753 8.87972 17.4382C8.8515 17.1755 8.86901 16.8971 8.90269 16.6351C8.9706 16.1069 9.12934 15.4656 9.32855 14.7849C9.70829 13.4872 10.2842 11.8852 10.8411 10.3362L10.9327 10.0814C11.5263 8.42931 12.082 6.8674 12.3901 5.72074C12.4172 5.61968 12.4418 5.52435 12.4638 5.43468C12.3924 5.48361 12.3178 5.53695 12.2401 5.59489C11.6173 6.05907 10.8627 6.76559 10.0357 7.69802Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $rapports }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Rapports
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M2 12H4V21H2V12ZM5 14H7V21H5V14ZM16 8H18V21H16V8ZM19 10H21V21H19V10ZM9 2H11V21H9V2ZM12 4H14V21H12V4Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $etudes }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Etudes & enquêtes
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $avis }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Avis & décisions
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20.9998 7L16 2H3.9985C3.44749 2 3 2.44405 3 2.9918V21.0082C3 21.5447 3.44476 22 3.9934 22H12.3414C12.1203 21.3744 12 20.7013 12 20C12 16.6863 14.6863 14 18 14C19.0928 14 20.1174 14.2922 20.9999 14.8026L20.9998 7ZM14.4646 19.4647L18.0001 23.0002L22.9498 18.0505L21.5356 16.6362L18.0001 20.1718L15.8788 18.0505L14.4646 19.4647Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $lois }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Lois
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12.998 2V3H19.998V5H12.998V19H16.998V21H6.99805V19H10.998V5H3.99805V3H10.998V2H12.998ZM4.99805 6.34315L7.82647 9.17157C8.55033 9.89543 8.99805 10.8954 8.99805 12C8.99805 14.2091 7.20719 16 4.99805 16C2.78891 16 0.998047 14.2091 0.998047 12C0.998047 10.8954 1.44576 9.89543 2.16962 9.17157L4.99805 6.34315ZM18.998 6.34315L21.8265 9.17157C22.5503 9.89543 22.998 10.8954 22.998 12C22.998 14.2091 21.2072 16 18.998 16C16.7889 16 14.998 14.2091 14.998 12C14.998 10.8954 15.4458 9.89543 16.1696 9.17157L18.998 6.34315ZM18.998 9.17157L17.5838 10.5858C17.2099 10.9597 16.998 11.4606 16.998 12L20.998 12.001C20.998 11.4606 20.7862 10.9597 20.4123 10.5858L18.998 9.17157ZM4.99805 9.17157L3.58383 10.5858C3.20988 10.9597 2.99805 11.4606 2.99805 12L6.99805 12.001C6.99805 11.4606 6.78621 10.9597 6.41226 10.5858L4.99805 9.17157Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $arretes }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Arrêtés
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $decrets }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Décrets
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">{{ $notes }}</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Notes de service
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 9V20.9925C21 21.5511 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.44694 2 3.99826 2H14V8C14 8.55228 14.4477 9 15 9H21ZM21 7H16V2.00318L21 7ZM8 7V9H11V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)"
            class="flex flex-col rounded-lg border border-gray-200 bg-white hover:border-gray-300 active:border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:active:border-green-700">
            <div class="flex grow items-center justify-between p-5">
                <dl>
                    <dt class="text-2xl font-bold">0</dt>
                    <dd class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Messages
                    </dd>
                </dl>
                <div
                    class="flex size-12 items-center justify-center rounded-xl border border-green-100 bg-green-50 text-green-500 dark:border-green-900 dark:bg-green-900/25 dark:text-green-100">
                    <svg class="inline-block size-4 flex-none text-gray-400 group-hover:text-gray-950 dark:group-hover:text-gray-50"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455Z">
                        </path>
                    </svg>
                </div>
            </div>
        </a>
    </div>

</div>
