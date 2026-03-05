<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Manage Experience
                </h2>
                <Link
                    :href="route('admin.experiences.create')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                >
                    Add Experience
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    v-if="$page.props.flash.success"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"
                >
                    {{ $page.props.flash.success }}
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        v-if="experiences.length === 0"
                        class="p-6 text-gray-500 text-center"
                    >
                        No experience entries yet. Click "Add Experience" to
                        create one.
                    </div>
                    <div v-else class="p-6">
                        <div class="space-y-4">
                            <div
                                v-for="experience in experiences"
                                :key="experience.id"
                                class="border rounded-lg p-4 hover:shadow-md transition"
                            >
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h3
                                            class="text-lg font-semibold text-gray-900"
                                        >
                                            {{ experience.position }}
                                        </h3>
                                        <p class="text-gray-600">
                                            {{ experience.company }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            {{
                                                formatDate(
                                                    experience.start_date,
                                                )
                                            }}
                                            -
                                            {{
                                                experience.current
                                                    ? "Present"
                                                    : formatDate(
                                                          experience.end_date,
                                                      )
                                            }}
                                        </p>
                                        <p
                                            v-if="experience.description"
                                            class="text-gray-700 mt-2 line-clamp-2"
                                        >
                                            {{ experience.description }}
                                        </p>
                                    </div>
                                    <div class="flex space-x-2 ml-4">
                                        <Link
                                            :href="
                                                route(
                                                    'admin.experiences.edit',
                                                    experience.id,
                                                )
                                            "
                                            class="text-blue-600 hover:text-blue-800 px-3 py-1 border border-blue-600 rounded"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            @click="
                                                deleteExperience(experience.id)
                                            "
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

defineProps({
    experiences: Array,
});

const formatDate = (date) => {
    if (!date) return "";
    return new Date(date).toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
    });
};

const deleteExperience = (id) => {
    if (confirm("Are you sure you want to delete this experience?")) {
        router.delete(route("admin.experiences.destroy", id));
    }
};
</script>
