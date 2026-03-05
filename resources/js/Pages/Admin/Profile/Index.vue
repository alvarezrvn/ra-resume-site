<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Profile
                </h2>
                <Link
                    :href="route('admin.profile.edit')"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500"
                >
                    Edit Profile
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="profile" class="p-6">
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                {{ profile.name }}
                            </h3>
                            <p
                                v-if="profile.title"
                                class="text-lg text-gray-600"
                            >
                                {{ profile.title }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div v-if="profile.email">
                                <span class="text-sm font-medium text-gray-500"
                                    >Email</span
                                >
                                <p class="text-gray-900">{{ profile.email }}</p>
                            </div>
                            <div v-if="profile.phone">
                                <span class="text-sm font-medium text-gray-500"
                                    >Phone</span
                                >
                                <p class="text-gray-900">{{ profile.phone }}</p>
                            </div>
                            <div v-if="profile.location">
                                <span class="text-sm font-medium text-gray-500"
                                    >Location</span
                                >
                                <p class="text-gray-900">
                                    {{ profile.location }}
                                </p>
                            </div>
                            <div v-if="profile.linkedin">
                                <span class="text-sm font-medium text-gray-500"
                                    >LinkedIn</span
                                >
                                <a
                                    :href="profile.linkedin"
                                    target="_blank"
                                    class="text-red-300 hover:text-red-100 block truncate"
                                    >{{ profile.linkedin }}</a
                                >
                            </div>
                            <div v-if="profile.github">
                                <span class="text-sm font-medium text-gray-500"
                                    >GitHub</span
                                >
                                <a
                                    :href="profile.github"
                                    target="_blank"
                                    class="text-red-300 hover:text-red-100 block truncate"
                                    >{{ profile.github }}</a
                                >
                            </div>
                            <div v-if="profile.website">
                                <span class="text-sm font-medium text-gray-500"
                                    >Website</span
                                >
                                <a
                                    :href="profile.website"
                                    target="_blank"
                                    class="text-red-300 hover:text-red-100 block truncate"
                                    >{{ profile.website }}</a
                                >
                            </div>
                        </div>

                        <div v-if="profile.summary" class="mt-6">
                            <span class="text-sm font-medium text-gray-500"
                                >Summary</span
                            >
                            <p class="text-gray-900 mt-2 whitespace-pre-line">
                                {{ profile.summary }}
                            </p>
                        </div>
                    </div>
                    <div v-else class="p-6 text-gray-500 text-center">
                        No profile information yet. Click "Edit Profile" to add
                        your information.
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
    profile: Object,
});
</script>

