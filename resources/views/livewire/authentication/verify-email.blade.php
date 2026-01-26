<div
    class="flex w-full flex-col justify-between gap-6 overflow-hidden bg-white p-6 lg:w-2/5 dark:bg-gray-900 dark:text-gray-100">
    <!-- session message -->
    @if (session('user-message'))
        <div x-data="{ showMessage: true }" x-init="setTimeout(() => showMessage = false, 3000)" class="fixed inset-x-0 top-0 z-60 m-2 sm:m-4">
            <div x-show="showMessage"
                class="container mx-auto flex items-center justify-between rounded-lg bg-green-700 p-4 shadow-lg xl:max-w-7xl">
                <div class="flex grow items-center gap-2 text-green-50 sm:text-lg">
                    <svg class="inline-block size-5 flex-none opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M2 5.5V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V19H20V7.3L12 14.5L2 5.5ZM0 10H5V12H0V10ZM0 15H8V17H0V15Z">
                        </path>
                    </svg>
                    <p class="text-sm font-medium">
                        {{ session('user-message') }}
                    </p>
                </div>
                <div class="ml-2 flex items-center">
                    <button type="button" @click="showMessage = false"
                        class="inline-flex items-center justify-center rounded-sm p-1 text-white opacity-75 hover:opacity-100 focus:ring-3 focus:ring-gray-500/25 focus:outline-hidden active:opacity-75">
                        <svg class="hi-solid hi-x inline-block size-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="flex-none text-center lg:text-left">
        <div class="inline-flex items-center">
            <img src="{{ asset("logo/anrtic.png") }}" class="inline-block w-30 h-auto"/>
        </div>
    </div>
    <div class="mx-auto flex w-full max-w-sm grow flex-col justify-center lg:py-28">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Veuillez vérifier votre adresse e-mail en cliquant
                sur le bouton ci-dessous pour recevoir le lien de vérification.
            </h2>
        </header>
        <!-- END Header -->

        <!-- Two Factor -->
        <div class="mb-6">
            <button type="button" wire:click="sendVerification"
                class="mx-auto flex w-full items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-6 py-3 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                Renvoyer le lien de vérification
            </button>
        </div>
        <form action="{{ route('logout') }}" class="space-y-6" method="POST">
            @csrf
            <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                <button type="submit"
                    class="font-medium text-gray-400 underline decoration-dotted hover:text-green-400 dark:text-green-400 dark:hover:text-green-300">
                    Se déconnecter
                </button>
            </div>
        </form>
        <!-- END Two Factor -->
    </div>
    <div class="flex-none text-center text-xs text-gray-500 lg:text-left dark:text-gray-400">
        <span class="font-medium">&copy; Tous les droits sont réservés.</span>
    </div>
</div>
