<div
    class="flex w-full flex-col justify-between gap-6 overflow-hidden bg-white p-6 lg:w-2/5 dark:bg-gray-900 dark:text-gray-100">
    <div class="flex-none text-center lg:text-left">
        <div class="inline-flex items-center gap-1.5 text-sm font-semibold">
            <img class="w-32 h-auto" src="{{ asset("logo/anrtic.png") }}" alt="logo-ANRTIC" />
        </div>
    </div>
    <div class="mx-auto flex w-full max-w-sm grow flex-col justify-center lg:py-28">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="mb-2 text-xl font-extrabold">
                Connectez-vous
            </h1>
        </header>
        <!-- END Header -->

        <form method="POST" wire:submit="login">
            <div class="flex flex-col gap-5">
                <div class="space-y-1">
                    <label for="email" class="inline-block text-sm font-medium">Adresse email</label>
                    <input type="email" id="email" wire:model="email" placeholder="Saisir votre adresse email"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-700/75 dark:bg-gray-900 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('email') {{ $message }} @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label for="password" class="inline-block text-sm font-medium">Mot de passe</label>
                    <input type="password" id="password" wire:model="password" placeholder="Saisir votre mot de passe"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-700/75 dark:bg-gray-900 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('password') {{ $message }} @enderror
                    </p>
                </div>
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <label class="flex items-center">
                            <input type="checkbox" id="remember" wire:model="remember"
                                class="size-4 rounded-sm border border-gray-200 text-green-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-700/75 dark:bg-gray-900 dark:ring-offset-gray-900 dark:checked:border-transparent dark:checked:bg-green-500 dark:focus:border-green-500 dark:focus:ring-offset-gray-900" />
                            <span class="ml-2 text-sm">Se souvenir de moi</span>
                        </label>
                        <a href="{{ route("password.request") }}"
                            class="inline-block text-sm font-medium text-green-600 hover:text-green-400 dark:text-green-400 dark:hover:text-green-300" wire:navigate>
                            Mot de passe oublié ?
                        </a>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-6 py-3 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                        <span>Se connecter</span>
                    </button>
                </div>
            </div>
        </form>
        <!-- END Sign in with email -->
    </div>
    <div class="flex-none text-center text-xs text-gray-500 lg:text-left dark:text-gray-400">
        <span class="font-medium">© Tous les droits sont réservés.</span>
    </div>
</div>
