<!-- Statistics: Card Alternate with Heading and Action -->
<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-8">

    @hasrole('SUPER_ADMIN')
        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Utilisateurs crées</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">264</dt>
                </dl>
            </div>
        </div>
    @endhasrole
    
    @hasrole('ADMIN')
        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Agents</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">{{ $agents }}</dt>
                </dl>
            </div>
        </div>

        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Equipements</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">{{ $equipements }}</dt>
                </dl>
            </div>
        </div>

        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Catégories</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">{{ $categories }}</dt>
                </dl>
            </div>
        </div>

        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Marques</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">{{ $marques }}</dt>
                </dl>
            </div>
        </div>

        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Demandeurs</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">{{ $demandeurs }}</dt>
                </dl>
            </div>
        </div>

        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Dossiers</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">0</dt>
                </dl>
            </div>
        </div>

        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Certificats</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">{{ $certificats }}</dt>
                </dl>
            </div>
        </div>

        <div class="flex flex-col rounded-xl bg-gray-100/75 p-2 ring ring-gray-200/50 dark:bg-gray-800/35 dark:text-gray-100 dark:ring-gray-800/60">
            <div class="flex items-center justify-between gap-2 px-4 pt-2 pb-4">
                <div>
                    <h3 class="font-medium">Notifications</h3>
                </div>
            </div>
            <div
                class="flex grow items-center justify-between rounded-lg bg-white p-4 text-sm shadow-xs shadow-gray-300/25 dark:bg-gray-900 dark:shadow-none">
                <dl>
                    <dt class="text-2xl font-bold">0</dt>
                </dl>
            </div>
        </div>
    @endhasrole
</div>

