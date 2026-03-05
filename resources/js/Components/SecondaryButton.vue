<script setup>
defineProps({
    type: {
        type: String,
        default: "button",
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-md border border-zinc-600 bg-zinc-900 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-zinc-100 shadow-sm transition duration-150 ease-in-out hover:border-red-300/60 hover:text-red-100 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-zinc-950 disabled:opacity-25"
    >
        <slot />
    </button>
</template>
