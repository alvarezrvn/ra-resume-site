<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6"
                >
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">
                            Resume Site Management
                        </h3>
                        <p class="text-gray-600">
                            Welcome to your resume site admin panel. Manage your
                            profile, experience, education, skills, and projects
                            from here.
                        </p>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-gray-500 text-sm mb-2">
                                Experiences
                            </div>
                            <div class="text-3xl font-bold text-red-300">
                                {{ stats.experiences }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-gray-500 text-sm mb-2">
                                Education
                            </div>
                            <div class="text-3xl font-bold text-green-600">
                                {{ stats.education }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-gray-500 text-sm mb-2">Skills</div>
                            <div class="text-3xl font-bold text-purple-600">
                                {{ stats.skills }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6">
                            <div class="text-gray-500 text-sm mb-2">
                                Projects
                            </div>
                            <div class="text-3xl font-bold text-orange-600">
                                {{ stats.projects }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <Link
                                :href="route('admin.profile.edit')"
                                class="flex items-center justify-between p-4 bg-red-500/10 rounded-lg hover:bg-red-500/20 transition"
                            >
                                <span class="font-medium text-red-100"
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
                                class="flex items-center justify-between p-4 bg-green-50 rounded-lg hover:bg-green-100 transition"
                            >
                                <span class="font-medium text-green-900"
                                    >Manage Experience</span
                                >
                                <svg
                                    class="w-5 h-5 text-green-600"
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
                                class="flex items-center justify-between p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition"
                            >
                                <span class="font-medium text-purple-900"
                                    >Manage Education</span
                                >
                                <svg
                                    class="w-5 h-5 text-purple-600"
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
                                class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition"
                            >
                                <span class="font-medium text-yellow-900"
                                    >Manage Skills</span
                                >
                                <svg
                                    class="w-5 h-5 text-yellow-600"
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
                                class="flex items-center justify-between p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition"
                            >
                                <span class="font-medium text-orange-900"
                                    >Manage Projects</span
                                >
                                <svg
                                    class="w-5 h-5 text-orange-600"
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
                                class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition"
                                target="_blank"
                            >
                                <span class="font-medium text-gray-900"
                                    >View Public Resume</span
                                >
                                <svg
                                    class="w-5 h-5 text-gray-600"
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

