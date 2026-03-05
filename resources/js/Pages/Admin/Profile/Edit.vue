<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label
                                    for="name"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Full Name *</label
                                >
                                <input
                                    v-model="form.name"
                                    type="text"
                                    id="name"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    required
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>

                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Professional Title</label
                                >
                                <input
                                    v-model="form.title"
                                    type="text"
                                    id="title"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.title"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label
                                    for="email"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Email</label
                                >
                                <input
                                    v-model="form.email"
                                    type="email"
                                    id="email"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.email"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.email }}
                                </div>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label
                                    for="phone"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Phone</label
                                >
                                <input
                                    v-model="form.phone"
                                    type="text"
                                    id="phone"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.phone"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.phone }}
                                </div>
                            </div>

                            <!-- Location -->
                            <div>
                                <label
                                    for="location"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Location</label
                                >
                                <input
                                    v-model="form.location"
                                    type="text"
                                    id="location"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.location"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.location }}
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div>
                                <label
                                    for="linkedin"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >LinkedIn URL</label
                                >
                                <input
                                    v-model="form.linkedin"
                                    type="url"
                                    id="linkedin"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.linkedin"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.linkedin }}
                                </div>
                            </div>

                            <!-- GitHub -->
                            <div>
                                <label
                                    for="github"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >GitHub URL</label
                                >
                                <input
                                    v-model="form.github"
                                    type="url"
                                    id="github"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.github"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.github }}
                                </div>
                            </div>

                            <!-- Website -->
                            <div>
                                <label
                                    for="website"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Website URL</label
                                >
                                <input
                                    v-model="form.website"
                                    type="url"
                                    id="website"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.website"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.website }}
                                </div>
                            </div>

                            <!-- Summary -->
                            <div class="md:col-span-2">
                                <label
                                    for="summary"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Professional Summary</label
                                >
                                <textarea
                                    v-model="form.summary"
                                    id="summary"
                                    rows="6"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400"
                                ></textarea>
                                <div
                                    v-if="form.errors.summary"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.summary }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <Link
                                :href="route('admin.dashboard')"
                                class="text-gray-600 hover:text-gray-900"
                            >
                                ← Back to Dashboard
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-500 disabled:opacity-50"
                            >
                                {{
                                    form.processing
                                        ? "Saving..."
                                        : "Save Profile"
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
    profile: Object,
});

const form = useForm({
    name: props.profile?.name || "",
    title: props.profile?.title || "",
    email: props.profile?.email || "",
    phone: props.profile?.phone || "",
    location: props.profile?.location || "",
    linkedin: props.profile?.linkedin || "",
    github: props.profile?.github || "",
    website: props.profile?.website || "",
    summary: props.profile?.summary || "",
});

const submit = () => {
    form.put(route("admin.profile.update"));
};
</script>

