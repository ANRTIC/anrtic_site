<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANRTIC | Comores</title>
    
    <!-- Inter + Caveat web fonts from Bunny.net (GDPR compliant) -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
      href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.bunny.net/css2?family=Caveat:wght@600&display=swap"
      rel="stylesheet"
    />
    @vite([
        'resources/css/app.css', 
        'resources/js/app.js'
    ])
</head>
<body>

    <div
        id="page-container"
        class="mx-auto flex min-h-dvh w-full min-w-80 flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100"
    >
        <!-- Page Content -->
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            @include("components.public_header")

            {{ $slot }}

            @include("components.public_footer")
        </main>
    </div>
    
</body>
</html>
