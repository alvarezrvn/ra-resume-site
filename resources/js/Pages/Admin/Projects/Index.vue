<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-zinc-100 leading-tight">
                    Manage Projects
                </h2>
                <Link
                    :href="route('admin.projects.create')"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500"
                >
                    Add Project
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
                        v-if="projects.length === 0"
                        class="p-6 text-zinc-400 text-center"
                    >
                        No projects yet. Click "Add Project" to create one.
                    </div>
                    <div v-else class="p-6">
                        <Link
                            :href="route('admin.dashboard')"
                            class="text-zinc-400 hover:text-zinc-200 inline-block mb-4"
                        >
                            ← Dashboard
                        </Link>
                        <div class="space-y-4">
                            <div
                                v-for="project in projects"
                                :key="project.id"
                                class="border border-zinc-700 rounded-lg p-4 hover:shadow-md transition"
                            >
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h3
                                            class="text-lg font-semibold text-zinc-100"
                                        >
                                            {{ project.name }}
                                        </h3>
                                        <div
                                            v-if="
                                                project.start_date ||
                                                project.end_date
                                            "
                                            class="text-sm text-zinc-400 mt-1"
                                        >
                                            {{ formatDate(project.start_date) }}
                                            -
                                            {{
                                                project.end_date
                                                    ? formatDate(
                                                          project.end_date,
                                                      )
                                                    : "Present"
                                            }}
                                        </div>
                                        <p
                                            v-if="project.description"
                                            class="text-zinc-300 mt-2 line-clamp-2"
                                        >
                                            {{ project.description }}
                                        </p>
                                        <div
                                            v-if="
                                                project.technologies &&
                                                project.technologies.length > 0
                                            "
                                            class="flex flex-wrap gap-2 mt-3"
                                        >
                                            <span
                                                v-for="tech in project.technologies"
                                                :key="tech"
                                                class="px-2 py-1 bg-zinc-800 text-zinc-300 text-xs rounded"
                                            >
                                                {{ tech }}
                                            </span>
                                        </div>
                                        <div
                                            v-if="
                                                project.url ||
                                                project.github_url
                                            "
                                            class="flex gap-4 mt-3"
                                        >
                                            <a
                                                v-if="project.url"
                                                :href="project.url"
                                                target="_blank"
                                                class="text-sm text-red-300 hover:text-red-100"
                                            >
                                                🔗 Live Demo
                                            </a>
                                            <a
                                                v-if="project.github_url"
                                                :href="project.github_url"
                                                target="_blank"
                                                class="text-sm text-red-300 hover:text-red-100"
                                            >
                                                📁 GitHub
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2 ml-4">
                                        <Link
                                            :href="
                                                route(
                                                    'admin.projects.edit',
                                                    project.id,
                                                )
                                            "
                                            class="text-red-300 hover:text-red-100 px-3 py-1 border border-red-400 rounded"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            @click="deleteProject(project.id)"
                                            class="text-red-600 hover:text-red-800 px-3 py-1 border border-red-600 rounded"
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
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { parseISO, format } from "date-fns";

defineProps({
    projects: Array,
});

const formatDate = (date) => {
    if (!date) return "";
    // Parse the date string and format it
    return format(parseISO(date), "MMM yyyy");
};

const deleteProject = (id) => {
    if (confirm("Are you sure you want to delete this project?")) {
        router.delete(route("admin.projects.destroy", id));
    }
};
</script>
