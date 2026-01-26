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
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Création d'un nouveau compte</h1>

                <p class="text-gray-600 mb-6">
                    Un compte a été créé pour vous.
                </p>

                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Voici vos identifiants de connexion :</h2>
                    <ol class="list-decimal list-inside text-gray-600 space-y-2">
                        <li>Email : {{ $email }}</li>
                        <li>Mot de passe : {{ $password }}</li>
                    </ol>
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
