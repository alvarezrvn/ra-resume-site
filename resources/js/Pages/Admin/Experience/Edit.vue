<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Experience
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Company -->
                            <div>
                                <label
                                    for="company"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Company *</label
                                >
                                <input
                                    v-model="form.company"
                                    type="text"
                                    id="company"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
                                />
                                <div
                                    v-if="form.errors.company"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.company }}
                                </div>
                            </div>

                            <!-- Position -->
                            <div>
                                <label
                                    for="position"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Position *</label
                                >
                                <input
                                    v-model="form.position"
                                    type="text"
                                    id="position"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
                                />
                                <div
                                    v-if="form.errors.position"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.position }}
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
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                />
                                <div
                                    v-if="form.errors.location"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.location }}
                                </div>
                            </div>

                            <!-- Order -->
                            <div>
                                <label
                                    for="order"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Display Order</label
                                >
                                <input
                                    v-model.number="form.order"
                                    type="number"
                                    id="order"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                />
                                <div
                                    v-if="form.errors.order"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.order }}
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div>
                                <label
                                    for="start_date"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Start Date *</label
                                >
                                <input
                                    v-model="form.start_date"
                                    type="date"
                                    id="start_date"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
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
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >End Date</label
                                >
                                <input
                                    v-model="form.end_date"
                                    type="date"
                                    id="end_date"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    :disabled="form.current"
                                />
                                <div
                                    v-if="form.errors.end_date"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.end_date }}
                                </div>
                            </div>

                            <!-- Current Position -->
                            <div class="md:col-span-2">
                                <label class="flex items-center">
                                    <input
                                        v-model="form.current"
                                        type="checkbox"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    />
                                    <span class="ml-2 text-sm text-gray-700"
                                        >I currently work here</span
                                    >
                                </label>
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label
                                    for="description"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                    >Description</label
                                >
                                <textarea
                                    v-model="form.description"
                                    id="description"
                                    rows="6"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Describe your responsibilities and achievements..."
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
                                :href="route('admin.experiences.index')"
                                class="text-gray-600 hover:text-gray-900"
                            >
                                ← Back to Experience List
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 disabled:opacity-50"
                            >
                                {{
                                    form.processing
                                        ? "Updating..."
                                        : "Update Experience"
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
    experience: Object,
});

const form = useForm({
    company: props.experience.company,
    position: props.experience.position,
    location: props.experience.location,
    start_date: props.experience.start_date,
    end_date: props.experience.end_date,
    current: props.experience.current,
    description: props.experience.description,
    order: props.experience.order,
});

const submit = () => {
    form.put(route("admin.experiences.update", props.experience.id));
};
</script>
