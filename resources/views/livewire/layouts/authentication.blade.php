<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANRTIC | Comores</title>

    <!-- Inter + Caveat web fonts from Bunny.net (GDPR compliant) -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
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
        class="mx-auto flex min-h-dvh w-full max-w-10xl min-w-80 flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100"
    >
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            <div class="flex min-h-dvh w-full">
                <!-- Form content -->
                {{ $slot }}

                <!-- Side Image -->
                <div class="hidden w-3/5 bg-white p-6 lg:block dark:bg-gray-900">
                    <div class="relative h-full w-full">
                    <div
                        class="absolute inset-0 z-1 rounded-3xl bg-linear-to-br from-purple-600/90 to-sky-600/90 mix-blend-overlay"
                    ></div>
                    <img
                        src="https://cdn.tailkit.com/media/placeholders/photo-1522071820081-1920x1280.jpg"
                        class="absolute inset-0 h-full w-full rounded-3xl object-cover"
                        alt="Sign in cover image"
                    />
                    </div>
                </div>
            </div>
        </main>
    </div>
    
</body>
</html>