<div 
    x-data="{
        index: 0,
        timer: null,
        count: {{ count($flash_infos) }},
        start() {
            this.timer = setInterval(() => {
                this.next()
            }, 5000)
        },
        stop() {
            clearInterval(this.timer)
        },
        next() {
            this.index = (this.index + 1) % this.count
        },
        prev() {
            this.index = (this.index - 1 + this.count) % this.count
        }
    }"
    x-init="start()"
    class="fixed inset-x-0 bottom-0 z-60 m-2 sm:m-4"
>
  <div class="container mx-auto flex items-center justify-between rounded-lg bg-green-700 p-4 shadow-lg xl:max-w-7xl">
    @foreach ($flash_infos as $i => $el)
        <div 
            x-show="index === {{ $i }}"
            x-transition.opacity
            class="flex grow items-center gap-2 text-emerald-50 sm:text-lg">
            <p class="text-sm font-medium">
                <span class="font-extrabold">{{ $el->categorie->name }}</span> · 
                {{ $el->title }}
            </p>
        </div>
    @endforeach
    <div class="ml-2 flex gap-4 items-center">
      <button
        type="button"
        @click="stop(); prev(); start()"
        class="inline-flex items-center justify-center rounded-sm p-1 text-white opacity-75 hover:opacity-100 focus:ring-3 focus:ring-gray-500/25 focus:outline-hidden active:opacity-75"
      >
        <svg 
            class="inline-block size-7"
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="currentColor"
        >
            <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path>
        </svg>
      </button>
      <button
        type="button"
        @click="stop(); next(); start()"
        class="inline-flex items-center justify-center rounded-sm p-1 text-white opacity-75 hover:opacity-100 focus:ring-3 focus:ring-gray-500/25 focus:outline-hidden active:opacity-75"
      >
        <svg 
            class="inline-block size-7"
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="currentColor"
        >
            <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
        </svg>
      </button>
    </div>
  </div>
</div>
<footer id="page-footer" class="bg-gray-900 text-gray-100">
    <div class="container mx-auto px-4 py-16 lg:px-8 lg:py-32 xl:max-w-7xl">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-4 md:gap-6 lg:gap-10">
            <div class="space-y-6">
                <h4 class="text-xs font-semibold tracking-wider text-gray-400/75 uppercase">
                    Restons en contact
                </h4>
                <nav class="flex flex-col gap-3 text-sm">
                    <div class="flex items-center gap-2">
                        <i class="ri-map-pin-line inline-block text-gray-400 text-xl"></i>
                        <a
                            href="#"
                            class="font-medium text-gray-400 hover:text-gray-50"
                        >
                            Avenue de la Republique <br/>
                            du Sénégal, Moroni, Comores
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ri-mail-line inline-block text-gray-400 text-xl"></i>
                        <div class="flex flex-col">
                            <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                                contact@anrtic.km
                            </a>
                            <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                                anrtic@gmail.com
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ri-phone-line inline-block text-gray-400 text-xl"></i>
                        <a href="#" class="font-medium text-gray-400 hover:text-gray-50">+269 773 87 61</a>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ri-inbox-archive-line inline-block text-gray-400 text-xl"></i>
                        <a
                            href="#"
                            class="font-medium text-gray-400 hover:text-gray-50"
                        >
                            BP: 6540, Moroni, <br/>
                            Union des Comores
                        </a>
                    </div>
                </nav>
            </div>
            <div class="space-y-6">
                <h4 class="text-xs font-semibold tracking-wider text-gray-400/75 uppercase">
                    À propos de nous
                </h4>
                <nav class="flex flex-col gap-3 text-sm">
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                        Mot du directeur
                    </a>
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                        Organigramme
                    </a>
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                        Plan stratégique
                    </a>
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                        Nos missions
                    </a>
                </nav>
            </div>
            <div class="space-y-6">
                <h4 class="text-xs font-semibold tracking-wider text-gray-400/75 uppercase">
                    Nos opérateurs
                </h4>
                <nav class="flex flex-col gap-3 text-sm">
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                        Comores Telecom
                    </a>
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                        Comores Cables
                    </a>
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-50">
                        TELCO
                    </a>
                </nav>
            </div>
            <div class="space-y-6">
                <h4 class="text-xs font-semibold tracking-wider text-gray-400/75 uppercase">
                    ANRTIC
                </h4>
                <div class="text-sm leading-relaxed">
                    Nous sommes l’institution étatique chargée de veiller 
                    à la mise en œuvre de la politique sectorielle des TIC et de la loi 
                    régissant le secteur sur toute l’étendue du territoire national.
                </div>
                <h4 class="text-xs font-semibold tracking-wider text-gray-400/75 uppercase">
                    S'abonner à notre newsletter
                </h4>
                <form onsubmit="return false;" class="space-y-3 sm:flex sm:items-center sm:gap-2 sm:space-y-0">
                    <div class="flex items-center">
                        <input type="email" id="email" name="email" placeholder="Saisir votre email"
                            class="block w-full grow rounded-l-lg border border-gray-600 bg-gray-900 px-3 py-2 text-sm leading-5 placeholder-gray-400 focus:z-1 focus:border-green-500 focus:ring-3 focus:ring-green-500/50" />
                        <button type="submit"
                            class="-ml-px inline-flex flex-none items-center justify-center gap-2 rounded-r-lg border border-green-700 bg-green-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/90 active:border-green-700 active:bg-green-700">
                            S'abonner
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="my-10 border-dashed border-gray-700/75" />
        <div
            class="flex flex-col gap-6 text-center text-sm md:flex-row-reverse md:justify-between md:gap-0 md:text-left">
            <nav class="space-x-4">
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="ri-facebook-circle-line inline-block size-5"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="ri-youtube-line inline-block size-5"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="ri-twitter-x-line inline-block size-5"></i>
                </a>
            </nav>
            <div class="text-gray-400/80">
                <span class="font-medium">© Tous les droits sont réservés.</span>
            </div>
        </div>
    </div>
</footer>
