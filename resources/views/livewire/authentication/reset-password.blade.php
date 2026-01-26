<div
    class="flex w-full flex-col justify-between gap-6 overflow-hidden bg-white p-6 lg:w-2/5 dark:bg-gray-900 dark:text-gray-100">
    <div class="flex-none text-center lg:text-left">
        <div class="inline-flex items-center">
            <img src="{{ asset("logo/anrtic.png") }}" class="inline-block w-30 h-auto"/>
        </div>
    </div>
    <div class="mx-auto flex w-full max-w-sm grow flex-col justify-center lg:py-28">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="mb-2 text-xl font-extrabold">Réinitialiser votre mot de passe</h1>
            <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Veuillez entrer votre nouveau mot de passe ci-dessous.
            </h2>
        </header>
        <!-- END Header -->

        <!-- Password Reset -->
        <form method="POST" wire:submit="resetPassword">
            @csrf
            <div class="flex flex-col gap-5">
                <div class="space-y-1">
                    <label for="email" class="inline-block text-sm font-medium">Adresse email</label>
                    <input type="text" id="email" wire:model="email"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-700/75 dark:bg-gray-900 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('email') {{ $message }} @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label for="password" class="inline-block text-sm font-medium">Nouveau mot de passe</label>
                    <input type="password" id="password" wire:model="password"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-700/75 dark:bg-gray-900 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('password') {{ $message }} @enderror
                    </p>
                </div>
                <div class="space-y-1">
                    <label for="password_confirmation" class="inline-block text-sm font-medium">Confirmer nouveau mot de passe</label>
                    <input type="password" id="password_confirmation" wire:model="password_confirmation"
                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:border-green-500 focus:ring-3 focus:ring-green-500/50 dark:border-gray-700/75 dark:bg-gray-900 dark:placeholder-gray-400 dark:focus:border-green-500" />
                    <p class="text-sm text-red-600 dark:text-red-400">
                        @error('password_confirmation') {{ $message }} @enderror
                    </p>
                </div>
                <div>
                    <button type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-green-700 bg-green-700 px-6 py-3 leading-6 font-semibold text-white hover:border-green-600 hover:bg-green-600 hover:text-white focus:ring-3 focus:ring-green-400/50 active:border-green-700 active:bg-green-700 dark:focus:ring-green-400/90">
                        <span>Enregistrer</span>
                    </button>
                </div>
            </div>
        </form>
        <!-- END Password Reset -->
    </div>
    <div class="flex-none text-center text-xs text-gray-500 lg:text-left dark:text-gray-400">
        <span class="font-medium">&copy; Tous les droits sont réservés.</span>
    </div>
</div>
