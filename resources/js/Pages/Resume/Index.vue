<template>
    <div class="resume-shell min-h-screen text-zinc-100">
        <div class="resume-noise"></div>
        <div class="resume-glow resume-glow-top"></div>
        <div class="resume-glow resume-glow-bottom"></div>

        <main
            class="relative z-10 mx-auto w-full max-w-6xl px-4 pb-20 pt-8 sm:px-6 lg:px-8"
        >
            <section
                class="resume-panel reveal-up rounded-3xl border border-white/10 p-6 sm:p-10"
            >
                <div v-if="profile" class="space-y-6">
                    <div
                        class="flex flex-wrap items-center justify-between gap-4"
                    >
                        <p
                            class="tracking-[0.2em] text-xs uppercase text-red-300/90"
                        >
                            Raven Resume
                        </p>
                        <div
                            class="flex items-center gap-2 text-xs text-zinc-300"
                        >
                            <span
                                class="inline-block h-2 w-2 rounded-full bg-red-400"
                            ></span>
                            Open to remote work and hybrid relocation
                            opportunities
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-5 sm:gap-6">
                        <img
                            :src="profileImageUrl"
                            alt="Profile photo"
                            class="h-24 w-24 rounded-full border border-white/20 object-cover shadow-lg sm:h-32 sm:w-32"
                        />
                        <div class="space-y-3">
                            <h1
                                class="text-balance text-3xl font-semibold tracking-tight text-white sm:text-5xl"
                            >
                                {{ profile.name }}
                            </h1>
                            <p
                                v-if="profile.title"
                                class="text-lg text-zinc-200 sm:text-2xl"
                            >
                                {{ profile.title }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 text-sm text-zinc-300">
                        <a
                            v-if="profile.email"
                            :href="`mailto:${profile.email}`"
                            class="resume-pill"
                        >
                            {{ profile.email }}
                        </a>
                        <span v-if="profile.phone" class="resume-pill">{{
                            profile.phone
                        }}</span>
                        <span v-if="profile.location" class="resume-pill">{{
                            profile.location
                        }}</span>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <a
                            :href="resumeFileUrl"
                            :download="resumeFileName"
                            class="resume-action"
                        >
                            Download Resume
                        </a>
                        <a
                            v-if="profile.linkedin"
                            :href="profile.linkedin"
                            target="_blank"
                            class="resume-action"
                            >LinkedIn</a
                        >
                        <a
                            v-if="profile.github"
                            :href="profile.github"
                            target="_blank"
                            class="resume-action"
                            >GitHub</a
                        >
                        <a
                            v-if="profile.website"
                            :href="profile.website"
                            target="_blank"
                            class="resume-action"
                            >Website</a
                        >
                    </div>
                </div>
            </section>

            <div class="mt-8 grid gap-8 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="space-y-8">
                    <section
                        v-if="profile?.summary"
                        class="resume-panel reveal-up rounded-2xl border border-white/10 p-6 sm:p-8"
                    >
                        <h2 class="resume-heading">Profile</h2>
                        <p class="mt-4 leading-7 text-zinc-300">
                            {{ profile.summary }}
                        </p>
                    </section>

                    <section
                        v-if="experiences.length > 0"
                        class="resume-panel reveal-up rounded-2xl border border-white/10 p-6 sm:p-8"
                    >
                        <h2 class="resume-heading">Experience</h2>
                        <div class="mt-6 space-y-6">
                            <article
                                v-for="exp in experiences"
                                :key="exp.id"
                                class="rounded-xl border border-white/10 bg-black/20 p-5"
                            >
                                <div
                                    class="flex flex-wrap items-start justify-between gap-3"
                                >
                                    <div>
                                        <h3
                                            class="text-xl font-medium text-zinc-100"
                                        >
                                            {{ exp.position }}
                                        </h3>
                                        <p class="mt-1 text-red-300">
                                            {{ exp.company }}
                                        </p>
                                    </div>
                                    <p class="text-sm text-zinc-400">
                                        {{ formatDate(exp.start_date) }} -
                                        {{
                                            exp.current
                                                ? "Present"
                                                : formatDate(exp.end_date)
                                        }}
                                    </p>
                                </div>
                                <p
                                    v-if="exp.location"
                                    class="mt-2 text-sm text-zinc-400"
                                >
                                    {{ exp.location }}
                                </p>
                                <p
                                    v-if="exp.description"
                                    class="mt-3 whitespace-pre-line text-zinc-300"
                                >
                                    {{ exp.description }}
                                </p>
                            </article>
                        </div>
                    </section>

                    <section
                        v-if="projects.length > 0"
                        class="resume-panel reveal-up rounded-2xl border border-white/10 p-6 sm:p-8"
                    >
                        <h2 class="resume-heading">Projects</h2>
                        <div class="mt-6 grid gap-5 sm:grid-cols-2">
                            <article
                                v-for="project in projects"
                                :key="project.id"
                                class="rounded-xl border border-white/10 bg-black/20 p-5"
                            >
                                <h3 class="text-lg font-medium text-zinc-100">
                                    {{ project.name }}
                                </h3>
                                <p
                                    v-if="project.description"
                                    class="mt-2 text-sm text-zinc-300"
                                >
                                    {{ project.description }}
                                </p>
                                <div
                                    v-if="project.technologies?.length"
                                    class="mt-3 flex flex-wrap gap-2"
                                >
                                    <span
                                        v-for="tech in project.technologies"
                                        :key="tech"
                                        class="rounded-full border border-red-300/40 bg-red-400/10 px-2.5 py-1 text-xs text-red-200"
                                    >
                                        {{ tech }}
                                    </span>
                                </div>
                                <div class="mt-4 flex flex-wrap gap-3 text-sm">
                                    <a
                                        v-if="project.url"
                                        :href="project.url"
                                        target="_blank"
                                        class="text-red-300 transition hover:text-red-200"
                                        >View Project</a
                                    >
                                    <a
                                        v-if="project.github_url"
                                        :href="project.github_url"
                                        target="_blank"
                                        class="text-red-300 transition hover:text-red-200"
                                        >GitHub</a
                                    >
                                </div>
                            </article>
                        </div>
                    </section>
                </div>

                <aside class="space-y-8">
                    <section
                        v-if="skills.length > 0"
                        class="resume-panel reveal-up rounded-2xl border border-white/10 p-6 sm:p-8"
                    >
                        <h2 class="resume-heading">Skills</h2>
                        <div class="mt-5 space-y-5">
                            <div
                                v-for="(
                                    categorySkills, category
                                ) in groupedSkills"
                                :key="category"
                            >
                                <h3
                                    class="text-sm font-semibold uppercase tracking-[0.12em] text-zinc-400"
                                >
                                    {{ category }}
                                </h3>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <span
                                        v-for="skill in categorySkills"
                                        :key="skill.id"
                                        class="rounded-full border border-zinc-600 bg-zinc-900/70 px-3 py-1 text-xs text-zinc-200"
                                    >
                                        {{ skill.name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section
                        v-if="education.length > 0"
                        class="resume-panel reveal-up rounded-2xl border border-white/10 p-6 sm:p-8"
                    >
                        <h2 class="resume-heading">Education</h2>
                        <div class="mt-5 space-y-5">
                            <article
                                v-for="edu in education"
                                :key="edu.id"
                                class="rounded-xl border border-white/10 bg-black/20 p-4"
                            >
                                <h3 class="text-base font-medium text-zinc-100">
                                    {{ edu.degree }}
                                </h3>
                                <p class="mt-1 text-sm text-red-300">
                                    {{ edu.institution }}
                                </p>
                                <p class="mt-1 text-xs text-zinc-400">
                                    {{ formatDate(edu.start_date) }} -
                                    {{ formatDate(edu.end_date) }}
                                </p>
                                <p
                                    v-if="edu.field_of_study"
                                    class="mt-2 text-sm text-zinc-300"
                                >
                                    {{ edu.field_of_study }}
                                </p>
                            </article>
                        </div>
                    </section>
                </aside>
            </div>
        </main>

        <div class="fixed bottom-4 right-4 z-20">
            <Link
                v-if="$page.props.auth.user"
                href="/admin/dashboard"
                class="rounded-full border border-red-300/50 bg-red-500/20 px-5 py-2 text-sm font-medium text-red-100 backdrop-blur transition hover:bg-red-500/30"
            >
                Admin Dashboard
            </Link>
            <Link
                v-else
                href="/login"
                class="rounded-full border border-zinc-500 bg-zinc-900/70 px-5 py-2 text-sm font-medium text-zinc-100 backdrop-blur transition hover:border-red-300/60 hover:text-red-100"
            >
                Login
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

import { format, parseISO } from "date-fns";
import { computed } from "vue";

const props = defineProps({
    profile: Object,
    experiences: Array,
    education: Array,
    skills: Array,
    projects: Array,
});

const profileImageUrl = "/assets/profile-image.jpg";
const resumeFileName = "Raven_Alvarez_Resume_2026.docx";
const resumeFileUrl = `/assets/${resumeFileName}`;

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
    // Extract just the date part (YYYY-MM-DD) to avoid timezone issues
    const dateOnly = date.split("T")[0];
    return format(parseISO(dateOnly), "MMM yyyy");
};
</script>
