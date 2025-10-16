<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANRTIC | Comores</title>

    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
</head>
<body>

    <div class="bg-gray-100 font-sans min-h-screen p-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header with Logo -->
            <div class="bg-indigo-600 px-6 py-4">
                <img src="{{ asset("logo/anrtic.png") }}" alt="Company Logo" class="h-8" />
            </div>

            <!-- Main Content -->
            <div class="p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Password Reset Request</h1>

                <p class="text-gray-600 mb-6">
                    Nous avons reçu une demande de réinitialisation du mot de passe de votre compte. 
                    Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer ce message en toute sécurité.
                </p>

                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Comment procéder:</h2>
                    <ol class="list-decimal list-inside text-gray-600 space-y-2">
                        <li>Cliquez sur le bouton ci-dessous</li>
                        <li>Vous serez redirigé vers une page sécurisée</li>
                        <li>Créez votre nouveau mot de passe</li>
                    </ol>
                </div>

                <!-- Reset Button -->
                <div class="text-center mb-8">
                    <a href="{{ $resetLink }}"
                        class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                        Réinitialiser mon mot de passe
                    </a>
                </div>

                <p class="text-sm text-gray-500 mb-4">
                    Ce lien expirera dans 24 heures. Passé ce délai, vous devrez soumettre une nouvelle demande.
                </p>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
                <div class="text-center text-gray-600 text-sm">
                    <p class="mb-2">Besoin d'aide? Contactez notre support client:</p>
                    <p>Email: contact@anrtic.km | Phone: (+269) 443 45 77/329 18 85</p>
                </div>
                <div class="mt-4 text-center text-xs text-gray-500">
                    <p>ANRTIC • BP: 6540, Avenue de la République du Sénégal • Moroni, Comores</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>
