<div
    class="flex w-full flex-col justify-between gap-6 overflow-hidden bg-white p-6 lg:w-2/5 dark:bg-gray-900 dark:text-gray-100">
    <div class="flex-none text-center lg:text-left">
        <div class="inline-flex items-center gap-1.5 text-sm font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 73 49" class="size-7">
                <path fill="#38bdf8"
                    d="M46.868 24c0 12.426-10.074 22.5-22.5 22.5-12.427 0-22.5-10.074-22.5-22.5S11.94 1.5 24.368 1.5c12.426 0 22.5 10.074 22.5 22.5Z" />
                <path fill="#a855f7"
                    d="M71.132 24c0 12.426-9.975 22.5-22.28 22.5-12.304 0-22.278-10.074-22.278-22.5S36.547 1.5 48.852 1.5c12.304 0 22.28 10.074 22.28 22.5Z" />
                <path fill="#6b21a8"
                    d="M36.67 42.842C42.81 38.824 46.868 31.886 46.868 24c0-7.886-4.057-14.824-10.198-18.841A22.537 22.537 0 0 0 26.573 24 22.537 22.537 0 0 0 36.67 42.842Z" />
            </svg>
            <span>Circles AI</span>
        </div>
    </div>
    <div class="mx-auto flex w-full max-w-sm grow flex-col justify-center lg:py-28">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="mb-2 text-xl font-extrabold">Mot de passe oublié ?</h1>
            <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">
                @if (session('status'))
                    <x-auth-session-status class="text-center" :status="session('status')" />
                @else
                    {{-- Message par défaut s'il n'y a pas de message de session --}}
                    <span class="text-sm text-gray-500">Veuillez entrer votre email pour recevoir un lien de réinitialisation.</span>
                @endif
            </h2>
        </header>
        <!-- END Header -->

        <!-- Password Reset -->
        <form method="POST" wire:submit.prevent="sendPasswordResetLink">
            @csrf
            <div class="flex flex-col gap-5">
                <div class="space-y-1">
                    <label for="email" class="inline-block text-sm font-medium">Adresse email</label>
                    <input type="text" id="email" wire:model="email" placeholder="Saisir votre adresse email"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-700/75 dark:bg-gray-900 dark:placeholder-gray-400 dark:focus:border-green-500" />
                </div>
                <div>
                    <button type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-6 py-3 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                        <span>Envoyer</span>
                    </button>
                </div>
            </div>
        </form>
        <!-- END Password Reset -->
    </div>
    @include("components.authentication_footer")
</div>
