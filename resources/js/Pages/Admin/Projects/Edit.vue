<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-zinc-100 leading-tight">
                Edit Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <form @submit.prevent="submit" class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label
                                    for="name"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Project Name *</label
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

                            <!-- URL -->
                            <div>
                                <label
                                    for="url"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Live URL</label
                                >
                                <input
                                    v-model="form.url"
                                    type="url"
                                    id="url"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    placeholder="https://example.com"
                                />
                                <div
                                    v-if="form.errors.url"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.url }}
                                </div>
                            </div>

                            <!-- GitHub URL -->
                            <div>
                                <label
                                    for="github_url"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >GitHub URL</label
                                >
                                <input
                                    v-model="form.github_url"
                                    type="url"
                                    id="github_url"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    placeholder="https://github.com/username/repo"
                                />
                                <div
                                    v-if="form.errors.github_url"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.github_url }}
                                </div>
                            </div>

                            <!-- Technologies -->
                            <div class="md:col-span-2">
                                <label
                                    for="technologies"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Technologies (comma-separated)</label
                                >
                                <input
                                    v-model="technologiesInput"
                                    type="text"
                                    id="technologies"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    placeholder="e.g., Laravel, Vue.js, Tailwind CSS"
                                />
                                <p class="text-xs text-zinc-400 mt-1">
                                    Separate technologies with commas
                                </p>
                                <div
                                    v-if="form.errors.technologies"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.technologies }}
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div>
                                <label
                                    for="start_date"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Start Date</label
                                >
                                <input
                                    v-model="form.start_date"
                                    type="date"
                                    id="start_date"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.start_date"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.start_date }}
                                </div>
                            </div>

                            <!-- End Date -->
                            <div>
                                <label
                                    for="end_date"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >End Date</label
                                >
                                <input
                                    v-model="form.end_date"
                                    type="date"
                                    id="end_date"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <p class="text-xs text-zinc-400 mt-1">
                                    Leave blank for ongoing projects
                                </p>
                                <div
                                    v-if="form.errors.end_date"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.end_date }}
                                </div>
                            </div>

                            <!-- Order -->
                            <div class="md:col-span-2">
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

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label
                                    for="description"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Description</label
                                >
                                <textarea
                                    v-model="form.description"
                                    id="description"
                                    rows="6"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    placeholder="Describe the project, your role, and key achievements..."
                                ></textarea>
                                <div
                                    v-if="form.errors.description"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.description }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <Link
                                :href="route('admin.projects.index')"
                                class="text-zinc-400 hover:text-zinc-200"
                            >
                                ← Back to Projects List
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-500 disabled:opacity-50"
                            >
                                {{
                                    form.processing
                                        ? "Updating..."
                                        : "Update Project"
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
import { ref, watch } from "vue";

const props = defineProps({
    project: Object,
});

const formatDateForInput = (date) => {
    if (!date) return "";
    // Extract just the date part (YYYY-MM-DD) from various formats
    return date.split(" ")[0].split("T")[0];
};

const form = useForm({
    name: props.project.name,
    description: props.project.description,
    url: props.project.url,
    github_url: props.project.github_url,
    technologies: props.project.technologies || [],
    start_date: formatDateForInput(props.project.start_date),
    end_date: formatDateForInput(props.project.end_date),
    order: props.project.order,
});

const technologiesInput = ref(
    Array.isArray(props.project.technologies)
        ? props.project.technologies.join(", ")
        : "",
);

watch(technologiesInput, (value) => {
    form.technologies = value
        ? value
              .split(",")
              .map((tech) => tech.trim())
              .filter(Boolean)
        : [];
});

const submit = () => {
    form.put(route("admin.projects.update", props.project.id));
};
</script>
