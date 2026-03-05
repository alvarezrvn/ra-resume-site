<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? "block w-full ps-3 pe-4 py-2 border-l-4 border-red-400 text-start text-base font-medium text-red-100 bg-red-500/10 focus:outline-none focus:text-red-100 focus:bg-red-500/20 focus:border-red-500 transition duration-150 ease-in-out"
        : "block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-zinc-300 hover:text-zinc-100 hover:bg-zinc-900/80 hover:border-zinc-600 focus:outline-none focus:text-zinc-100 focus:bg-zinc-900/80 focus:border-zinc-600 transition duration-150 ease-in-out",
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
