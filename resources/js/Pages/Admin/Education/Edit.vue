<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-zinc-100 leading-tight">
                Edit Education
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <form @submit.prevent="submit" class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Institution -->
                            <div class="md:col-span-2">
                                <label
                                    for="institution"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Institution *</label
                                >
                                <input
                                    v-model="form.institution"
                                    type="text"
                                    id="institution"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    required
                                />
                                <div
                                    v-if="form.errors.institution"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.institution }}
                                </div>
                            </div>

                            <!-- Degree -->
                            <div>
                                <label
                                    for="degree"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Degree *</label
                                >
                                <input
                                    v-model="form.degree"
                                    type="text"
                                    id="degree"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                    required
                                />
                                <div
                                    v-if="form.errors.degree"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.degree }}
                                </div>
                            </div>

                            <!-- Field of Study -->
                            <div>
                                <label
                                    for="field_of_study"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Field of Study</label
                                >
                                <input
                                    v-model="form.field_of_study"
                                    type="text"
                                    id="field_of_study"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.field_of_study"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.field_of_study }}
                                </div>
                            </div>

                            <!-- Location -->
                            <div>
                                <label
                                    for="location"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >Location</label
                                >
                                <input
                                    v-model="form.location"
                                    type="text"
                                    id="location"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.location"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.location }}
                                </div>
                            </div>

                            <!-- GPA -->
                            <div>
                                <label
                                    for="gpa"
                                    class="block text-sm font-medium text-zinc-200 mb-2"
                                    >GPA</label
                                >
                                <input
                                    v-model="form.gpa"
                                    type="text"
                                    id="gpa"
                                    class="w-full rounded-md bg-zinc-800 border-zinc-700 text-zinc-100 shadow-sm focus:border-red-400 focus:ring-red-400"
                                />
                                <div
                                    v-if="form.errors.gpa"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.gpa }}
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
                                <div
                                    v-if="form.errors.end_date"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.end_date }}
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
                                    placeholder="Describe your achievements, honors, or relevant coursework..."
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
                                :href="route('admin.education.index')"
                                class="text-zinc-400 hover:text-zinc-200"
                            >
                                ← Back to Education List
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-500 disabled:opacity-50"
                            >
                                {{
                                    form.processing
                                        ? "Updating..."
                                        : "Update Education"
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
    education: Object,
});

const formatDateForInput = (date) => {
    if (!date) return "";
    // Extract just the date part (YYYY-MM-DD) from various formats
    return date.split(" ")[0].split("T")[0];
};

const form = useForm({
    institution: props.education.institution,
    degree: props.education.degree,
    field_of_study: props.education.field_of_study,
    location: props.education.location,
    start_date: formatDateForInput(props.education.start_date),
    end_date: formatDateForInput(props.education.end_date),
    gpa: props.education.gpa,
    description: props.education.description,
    order: props.education.order,
});

const submit = () => {
    form.put(route("admin.education.update", props.education.id));
};
</script>
