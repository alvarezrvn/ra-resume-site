<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-zinc-950 pt-6 text-zinc-100 sm:justify-center sm:pt-0"
    >
        <div>
            <Link href="/">
                <ApplicationLogo class="h-20 w-20 fill-current text-red-200" />
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden rounded-lg border border-zinc-700 bg-zinc-900 px-6 py-4 shadow-md sm:max-w-md"
        >
            <slot />
        </div>
    </div>
</template>
