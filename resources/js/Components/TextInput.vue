<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="rounded-md border-zinc-600 bg-zinc-900 text-zinc-100 shadow-sm placeholder:text-zinc-500 focus:border-red-400 focus:ring-red-400"
        v-model="model"
        ref="input"
    />
</template>
