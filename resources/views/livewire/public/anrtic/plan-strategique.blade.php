<div>

    <!-- En-tête -->
    @if ($page)
        <div class="bg-gray-100 dark:bg-gray-800">
            <div class="container mx-auto px-4 py-16 lg:px-8 xl:max-w-7xl">
                <div class="pb-3">
                    <nav class="mb-4 dark:text-gray-100">
                        <ol class="flex items-center">
                            <li>
                                <a href="#" class="text-sm text-emerald-600">
                                    L'ANRTIC
                                </a>
                            </li>
                            <li class="flex items-center px-1 opacity-25">
                                <svg class="hi-mini hi-chevron-right inline-block size-5"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-900">
                                    {{ $page->title }}
                                </a>
                            </li>
                        </ol>
                    </nav>
                    <h2 class="text-3xl lg:text-5xl font-black text-gray-900 dark:text-white">
                        {{ $page->title }}
                    </h2>
                </div>
            </div>
        </div>
    @endif


    <!-- Contenu -->
    <div class="bg-white dark:bg-gray-900 dark:text-gray-100">
        <div class="container mx-auto px-4 py-16 lg:px-8 lg:py-32 xl:max-w-7xl">

            @if ($page)
                <div class="grid grid-cols-1">
                    <div class="md:col-span-12">
                        <div class="space-y-0.5 leading-relaxed">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            @else
                <div class="mx-auto px-3 min-[576px]:max-w-[540px] md:max-w-[720px] lg:max-w-[930px] xl:max-w-[1434px]">
                    <div
                        class="grid grid-cols-12 items-center mt-[50px] lg:mt-[100px] pb-[70px] lg:pb-[140px] mb-[81px]">
                        <div class="col-span-12 xl:col-span-7">
                            <div class="flex flex-col mb-6 xl:mb-0">
                                <button
                                    class="bg-green-700 rounded text-white font-bold w-fit pb-2 text-[12px] leading-[12px] pl-[11px] pr-[10px] pt-[5px] mb-4">
                                    En cours de construction
                                </button>
                                <p
                                    class="font-extrabold text-[34px] leading-[40px] sm:text-[50px] sm:leading-[60px] lg:text-[64px] lg:leading-[72px] mb-[34px]">
                                    Cette page est actuellement en développement.
                                </p>
                                <p class="text-base font-medium text-gray-500 mb-4 max-w-[508px]">
                                    Revenez bientôt pour découvrir son contenu !
                                </p>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-5">
                            <img src="{{ asset('illustrations/coming_soon.svg') }}" />
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

</div>
