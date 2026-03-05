<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-zinc-100 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg mb-6"
                >
                    <div class="p-6 text-zinc-100">
                        <h3 class="text-lg font-semibold mb-4">
                            Resume Site Management
                        </h3>
                        <p class="text-zinc-300">
                            Welcome to your resume site admin panel. Manage your
                            profile, experience, education, skills, and projects
                            from here.
                        </p>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div
                        class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-zinc-400 text-sm mb-2">
                                Experiences
                            </div>
                            <div class="text-3xl font-bold text-red-400">
                                {{ stats.experiences }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-zinc-400 text-sm mb-2">
                                Education
                            </div>
                            <div class="text-3xl font-bold text-red-400">
                                {{ stats.education }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-zinc-400 text-sm mb-2">Skills</div>
                            <div class="text-3xl font-bold text-red-400">
                                {{ stats.skills }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-zinc-400 text-sm mb-2">
                                Projects
                            </div>
                            <div class="text-3xl font-bold text-red-400">
                                {{ stats.projects }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div
                    class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-zinc-100 mb-4">
                            Quick Links
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <Link
                                :href="route('admin.profile.edit')"
                                class="flex items-center justify-between p-4 bg-red-500/10 border border-red-500/20 rounded-lg hover:bg-red-500/20 transition"
                            >
                                <span class="font-medium text-red-300"
                                    >Edit Profile</span
                                >
                                <svg
                                    class="w-5 h-5 text-red-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="route('admin.experiences.index')"
                                class="flex items-center justify-between p-4 bg-green-500/10 border border-green-500/20 rounded-lg hover:bg-green-500/20 transition"
                            >
                                <span class="font-medium text-green-300"
                                    >Manage Experience</span
                                >
                                <svg
                                    class="w-5 h-5 text-green-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="route('admin.education.index')"
                                class="flex items-center justify-between p-4 bg-purple-500/10 border border-purple-500/20 rounded-lg hover:bg-purple-500/20 transition"
                            >
                                <span class="font-medium text-purple-300"
                                    >Manage Education</span
                                >
                                <svg
                                    class="w-5 h-5 text-purple-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="route('admin.skills.index')"
                                class="flex items-center justify-between p-4 bg-amber-500/10 border border-amber-500/20 rounded-lg hover:bg-amber-500/20 transition"
                            >
                                <span class="font-medium text-amber-300"
                                    >Manage Skills</span
                                >
                                <svg
                                    class="w-5 h-5 text-amber-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="route('admin.projects.index')"
                                class="flex items-center justify-between p-4 bg-orange-500/10 border border-orange-500/20 rounded-lg hover:bg-orange-500/20 transition"
                            >
                                <span class="font-medium text-orange-300"
                                    >Manage Projects</span
                                >
                                <svg
                                    class="w-5 h-5 text-orange-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="route('resume.index')"
                                class="flex items-center justify-between p-4 bg-blue-500/10 border border-blue-500/20 rounded-lg hover:bg-blue-500/20 transition"
                                target="_blank"
                            >
                                <span class="font-medium text-blue-300"
                                    >View Public Resume</span
                                >
                                <svg
                                    class="w-5 h-5 text-blue-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                    />
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    stats: Object,
});
</script>
