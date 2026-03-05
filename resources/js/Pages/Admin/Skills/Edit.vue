<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-zinc-100 leading-tight">
                Edit Skill
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <form @submit.prevent="submit" class="p-6">
                        <div class="space-y-6">
                            <!-- Name -->
                            <div>
                                <label
                                    for="name"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Skill Name *</label
                                >
                                <input
                                    v-model="form.name"
                                    type="text"
                                    id="name"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    required
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>

                            <!-- Category -->
                            <div>
                                <label
                                    for="category"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Category</label
                                >
                                <input
                                    v-model="form.category"
                                    type="text"
                                    id="category"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    placeholder="e.g., Programming Languages, Frameworks, Tools"
                                />
                                <div
                                    v-if="form.errors.category"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.category }}
                                </div>
                            </div>

                            <!-- Proficiency -->
                            <div>
                                <label
                                    for="proficiency"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Proficiency (0-100)</label
                                >
                                <input
                                    v-model.number="form.proficiency"
                                    type="number"
                                    id="proficiency"
                                    min="0"
                                    max="100"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    class="w-full bg-zinc-700 rounded-full h-2 mt-2"
                                >
                                    <div
                                        class="bg-red-500 h-2 rounded-full transition-all"
                                        :style="`width: ${form.proficiency}%`"
                                    ></div>
                                </div>
                                <div
                                    v-if="form.errors.proficiency"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.proficiency }}
                                </div>
                            </div>

                            <!-- Order -->
                            <div>
                                <label
                                    for="order"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Display Order</label
                                >
                                <input
                                    v-model.number="form.order"
                                    type="number"
                                    id="order"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.order"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.order }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <Link
                                :href="route('admin.skills.index')"
                                class="text-zinc-400 hover:text-zinc-200"
                            >
                                ← Back to Skills List
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-500 disabled:opacity-50"
                            >
                                {{
                                    form.processing
                                        ? "Updating..."
                                        : "Update Skill"
                                }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    skill: Object,
});

const form = useForm({
    name: props.skill.name,
    category: props.skill.category,
    proficiency: props.skill.proficiency,
    order: props.skill.order,
});

const submit = () => {
    form.put(route("admin.skills.update", props.skill.id));
};
</script>
