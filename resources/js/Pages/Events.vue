<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<script>
const events = await axios.get(route('events.list.get'))
</script>

<template>
    <Head title="Events" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Events</h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <li v-for="event in events.data.events">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100"> {{ event.title }} </div>
                </div>
            </li>
        </div>
        
    </AuthenticatedLayout>
</template>
