<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Header/Profile Section -->
        <div
            class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-16"
        >
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div v-if="profile" class="text-center">
                    <h1 class="text-5xl font-bold mb-2">{{ profile.name }}</h1>
                    <p v-if="profile.title" class="text-2xl text-blue-100 mb-4">
                        {{ profile.title }}
                    </p>
                    <div class="flex justify-center space-x-6 mb-6">
                        <a
                            v-if="profile.email"
                            :href="`mailto:${profile.email}`"
                            class="text-blue-100 hover:text-white"
                        >
                            {{ profile.email }}
                        </a>
                        <span v-if="profile.phone" class="text-blue-100">{{
                            profile.phone
                        }}</span>
                        <span v-if="profile.location" class="text-blue-100">{{
                            profile.location
                        }}</span>
                    </div>
                    <div class="flex justify-center space-x-4">
                        <a
                            v-if="profile.linkedin"
                            :href="profile.linkedin"
                            target="_blank"
                            class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-50"
                            >LinkedIn</a
                        >
                        <a
                            v-if="profile.github"
                            :href="profile.github"
                            target="_blank"
                            class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-50"
                            >GitHub</a
                        >
                        <a
                            v-if="profile.website"
                            :href="profile.website"
                            target="_blank"
                            class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-50"
                            >Website</a
                        >
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Summary -->
            <section v-if="profile?.summary" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">About Me</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-700 leading-relaxed">
                        {{ profile.summary }}
                    </p>
                </div>
            </section>

            <!-- Experience -->
            <section v-if="experiences.length > 0" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Experience
                </h2>
                <div class="space-y-6">
                    <div
                        v-for="exp in experiences"
                        :key="exp.id"
                        class="bg-white rounded-lg shadow p-6"
                    >
                        <h3 class="text-xl font-semibold text-gray-900">
                            {{ exp.position }}
                        </h3>
                        <p class="text-lg text-blue-600 mb-2">
                            {{ exp.company }}
                        </p>
                        <p class="text-gray-600 mb-3">
                            <span v-if="exp.location"
                                >{{ exp.location }} •
                            </span>
                            {{ formatDate(exp.start_date) }} -
                            {{
                                exp.current
                                    ? "Present"
                                    : formatDate(exp.end_date)
                            }}
                        </p>
                        <p
                            v-if="exp.description"
                            class="text-gray-700 whitespace-pre-line"
                        >
                            {{ exp.description }}
                        </p>
                    </div>
                </div>
            </section>

            <!-- Education -->
            <section v-if="education.length > 0" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Education</h2>
                <div class="space-y-6">
                    <div
                        v-for="edu in education"
                        :key="edu.id"
                        class="bg-white rounded-lg shadow p-6"
                    >
                        <h3 class="text-xl font-semibold text-gray-900">
                            {{ edu.degree }}
                        </h3>
                        <p class="text-lg text-blue-600 mb-2">
                            {{ edu.institution }}
                        </p>
                        <p class="text-gray-600 mb-3">
                            <span v-if="edu.field_of_study"
                                >{{ edu.field_of_study }} •
                            </span>
                            <span v-if="edu.location"
                                >{{ edu.location }} •
                            </span>
                            <span v-if="edu.start_date || edu.end_date">
                                {{ formatDate(edu.start_date) }} -
                                {{ formatDate(edu.end_date) }}
                            </span>
                            <span v-if="edu.gpa"> • GPA: {{ edu.gpa }}</span>
                        </p>
                        <p
                            v-if="edu.description"
                            class="text-gray-700 whitespace-pre-line"
                        >
                            {{ edu.description }}
                        </p>
                    </div>
                </div>
            </section>

            <!-- Skills -->
            <section v-if="skills.length > 0" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Skills</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <div
                        v-for="(categorySkills, category) in groupedSkills"
                        :key="category"
                        class="mb-6 last:mb-0"
                    >
                        <h3
                            v-if="category !== 'null'"
                            class="text-lg font-semibold text-gray-900 mb-3"
                        >
                            {{ category }}
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="skill in categorySkills"
                                :key="skill.id"
                                class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm"
                            >
                                {{ skill.name }}
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Projects -->
            <section v-if="projects.length > 0" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Projects</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div
                        v-for="project in projects"
                        :key="project.id"
                        class="bg-white rounded-lg shadow p-6"
                    >
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            {{ project.name }}
                        </h3>
                        <p
                            v-if="project.description"
                            class="text-gray-700 mb-3"
                        >
                            {{ project.description }}
                        </p>
                        <div
                            v-if="project.technologies?.length"
                            class="flex flex-wrap gap-2 mb-3"
                        >
                            <span
                                v-for="tech in project.technologies"
                                :key="tech"
                                class="bg-gray-200 text-gray-700 px-2 py-1 rounded text-xs"
                            >
                                {{ tech }}
                            </span>
                        </div>
                        <div class="flex space-x-3">
                            <a
                                v-if="project.url"
                                :href="project.url"
                                target="_blank"
                                class="text-blue-600 hover:text-blue-800 text-sm"
                                >View Project</a
                            >
                            <a
                                v-if="project.github_url"
                                :href="project.github_url"
                                target="_blank"
                                class="text-blue-600 hover:text-blue-800 text-sm"
                                >GitHub</a
                            >
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Admin Login Link -->
        <div class="fixed bottom-4 right-4">
            <Link
                v-if="$page.props.auth.user"
                href="/admin/dashboard"
                class="bg-blue-600 text-white px-4 py-2 rounded shadow-lg hover:bg-blue-700"
            >
                Admin Dashboard
            </Link>
            <Link
                v-else
                href="/login"
                class="bg-gray-600 text-white px-4 py-2 rounded shadow-lg hover:bg-gray-700"
            >
                Login
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    profile: Object,
    experiences: Array,
    education: Array,
    skills: Array,
    projects: Array,
});

const groupedSkills = computed(() => {
    return props.skills.reduce((acc, skill) => {
        const category = skill.category || "Other";
        if (!acc[category]) {
            acc[category] = [];
        }
        acc[category].push(skill);
        return acc;
    }, {});
});

const formatDate = (date) => {
    if (!date) return "";
    return new Date(date).toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
    });
};
</script>
