<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="container mx-auto px-8 py-8 flex flex-wrap">
            <div class="w-3/12 p-4 border-gray-200 border-r bg-white shadow-sm">
                col
            </div>
            <div class="w-6/12 p-4 bg-white shadow-sm">
                col
            </div>
            <div class="w-3/12 p-4 border-gray-200 border-l bg-white shadow-smz">
                col
            </div>
        </div>
    </AppLayout>
</template>
