<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    'questions': Array
})
</script>

<template>
    <AppLayout title="Questions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Questions
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ul class="bg-white rounded-lg overflow-hidden divide-y-2">
                    <li class="p-4" v-for="question in questions" :key="question.id">
                        <Link :href="route('questions.edit', question)">
                            {{ question.label }}
                        </Link>
                    </li>
                </ul>
                <div class="mt-4">

                    <Link :href="route('questions.create')">Créer une nouvelle question</Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
