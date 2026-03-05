<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-zinc-100 leading-tight">
                    Manage Skills
                </h2>
                <Link
                    :href="route('admin.skills.create')"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500"
                >
                    Add Skill
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    v-if="$page.props.flash?.success"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"
                >
                    {{ $page.props.flash?.success }}
                </div>

                <div
                    class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div
                        v-if="skills.length === 0"
                        class="p-6 text-zinc-400 text-center"
                    >
                        No skills yet. Click "Add Skill" to create one.
                    </div>
                    <div v-else class="p-6">
                        <Link
                            :href="route('admin.dashboard')"
                            class="text-zinc-400 hover:text-zinc-200 inline-block mb-4"
                        >
                            ← Dashboard
                        </Link>
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                        >
                            <div
                                v-for="skill in skills"
                                :key="skill.id"
                                class="border border-zinc-700 rounded-lg p-4 hover:shadow-md transition"
                            >
                                <div
                                    class="flex justify-between items-start mb-3"
                                >
                                    <div class="flex-1">
                                        <h3
                                            class="text-lg font-semibold text-zinc-100"
                                        >
                                            {{ skill.name }}
                                        </h3>
                                        <p
                                            v-if="skill.category"
                                            class="text-sm text-zinc-400"
                                        >
                                            {{ skill.category }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div
                                        class="flex items-center justify-between text-sm text-zinc-400 mb-1"
                                    >
                                        <span>Proficiency</span>
                                        <span>{{ skill.proficiency }}%</span>
                                    </div>
                                    <div
                                        class="w-full bg-zinc-700 rounded-full h-2"
                                    >
                                        <div
                                            class="bg-red-500 h-2 rounded-full"
                                            :style="`width: ${skill.proficiency}%`"
                                        ></div>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <Link
                                        :href="
                                            route('admin.skills.edit', skill.id)
                                        "
                                        class="flex-1 text-center text-red-300 hover:text-red-100 px-3 py-1 border border-red-400 rounded text-sm"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        @click="deleteSkill(skill.id)"
                                        class="flex-1 text-red-600 hover:text-red-800 px-3 py-1 border border-red-600 rounded text-sm"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router } from "@inertiajs/vue3";

defineProps({
    skills: Array,
});

const deleteSkill = (id) => {
    if (confirm("Are you sure you want to delete this skill?")) {
        router.delete(route("admin.skills.destroy", id));
    }
};
</script>
