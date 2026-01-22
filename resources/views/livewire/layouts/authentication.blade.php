<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANRTIC | Comores</title>

    <!-- Inter + Caveat web fonts from Bunny.net (GDPR compliant) -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.bunny.net/css2?family=Caveat:wght@600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div id="page-container"
        class="mx-auto flex min-h-dvh w-full max-w-10xl min-w-80 flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            <div class="flex min-h-dvh w-full">
                <!-- Form content -->
                {{ $slot }}

                <!-- Side Image -->
                <div class="hidden w-3/5 bg-white p-6 lg:block dark:bg-gray-900">
                    <div class="relative h-full w-full">
                        <!--
                        <div
                            class="absolute inset-0 z-1 rounded-3xl bg-linear-to-br from-purple-600/90 to-sky-600/90 mix-blend-overlay"
                        ></div>
                        <img
                            src="https://cdn.tailkit.com/media/placeholders/photo-1522071820081-1920x1280.jpg"
                            class="absolute inset-0 h-full w-full rounded-3xl object-cover"
                            alt="Sign in cover image"
                        /> -->

                        <div x-data="{
                            // Images array
                            images: @js([
                                asset('slide_image/image1.jpg'),
                                asset('slide_image/image2.jpg'),
                                asset('slide_image/image3.jpg'),
                            ]),
                        
                            autoplay: true,
                            autoplayDuration: 5000,
                            currentIndex: 0,
                            autoplayInterval: null,

                            init() {
                                this.startAutoplayInterval();
                            },

                            startAutoplayInterval() {
                                this.autoplayInterval = setInterval(() => {
                                    this.next();
                                }, this.autoplayDuration);
                            },

                            next() {
                                this.currentIndex = (this.currentIndex + 1) % this.images.length;
                            }
                        }" class="h-full w-full"
                            x-bind:class="{
                                'pb-3': dotsNavigation === 'inner',
                            }">
                            <!-- Image Slider Container -->
                            <div class="group relative h-full w-full overflow-hidden rounded-3xl ring-8 ring-gray-500/10
                                focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-400/60
                                dark:ring-gray-500/25"
                                tabindex="0" x-on:keyup.right="next('button')" x-on:keyup.left="previous('button')">
                                <!-- Images -->
                                <div class="relative h-full w-full" role="region" aria-roledescription="carousel"
                                    aria-label="Image Slider">
                                    <template x-for="(image, index) in images" x-bind:key="index">
                                        <img
                                            :src="image"
                                            class="absolute inset-0 h-full w-full object-cover"
                                            x-show="currentIndex === index"
                                            x-transition.opacity.duration.1000ms
                                        >
                                    </template>
                                </div>
                                <!-- END Images -->

                                <!-- Progress Bar -->
                                <div x-cloak x-show="autoplayProgressBar"
                                    class="absolute inset-x-0 bottom-0 z-10 h-1.5 w-full overflow-hidden"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                    x-bind:aria-valuenow="Math.round(autoplayProgress)"
                                    x-bind:aria-valuetext="`${Math.round(autoplayProgress)}% progress to next image slide`">
                                    <div class="h-full rounded-r-full bg-orange-500 transition-all duration-100 ease-linear"
                                        :style="{ width: `${autoplayProgress}%` }"></div>
                                </div>
                                <!-- END Progress Bar -->
                            </div>
                            <!-- END Image Slider Container -->

                            <!-- Dots Navigation -->
                            <div x-cloak x-show="dotsNavigation" class="flex justify-center gap-3 py-2"
                                x-bind:class="{
                                    'relative -mt-14 z-10': dotsNavigation === 'inner',
                                    'mt-4': dotsNavigation === 'after'
                                }">
                                <div class="inline-flex flex-wrap justify-center gap-3 rounded-xl border p-2"
                                    x-bind:class="{
                                        'bg-gray-900/40 border-gray-800/50': dotsNavigation === 'inner',
                                        'bg-gray-50 border-gray-100 dark:bg-gray-700/25 dark:border-gray-600/40': dotsNavigation === 'after',
                                    }">
                                    <template x-for="(image, index) in images" x-bind:key="index">
                                        <button x-on:click="set(index, 'button')" type="button"
                                            class="size-2.5 rounded-full"
                                            x-bind:class="{
                                                'bg-white shadow': currentIndex === index &&
                                                    dotsNavigation === 'inner',
                                                'bg-white/40 hover:bg-white/90 hover:ring-4 ring-white/25 shadow': currentIndex !==
                                                    index && dotsNavigation === 'inner',
                                                'bg-gray-700 dark:bg-gray-200': currentIndex === index &&
                                                    dotsNavigation === 'after',
                                                'bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-400 dark:ring-gray-700 hover:ring-4 ring-gray-200': currentIndex !==
                                                    index && dotsNavigation === 'after'
                                            }"></button>
                                    </template>
                                </div>
                            </div>
                            <!-- END Dots Navigation -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
