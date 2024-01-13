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
            <div class="w-3/12 px-6 py-8 border-gray-200 border-r bg-white shadow-sm rounded-tl-md">
                <div class="flex items-center gap-x-4">
                    <div class="w-2/6">
                        <div class="flex items-center justify-center text-2xl bg-green-500 rounded-full w-16 h-16">🐸</div>
                    </div>
                    <div class="w-4/6">
                        <h2 class="text-gray-800 text-lg font-semibold mb-1">John Doe</h2>
                        <p class="text-gray-700 text-md">Super developer</p>
                    </div>
                </div>
            </div>
            <div class="w-6/12 bg-white shadow-sm">
                <div class="border-gray-200 border-b px-6 py-4">
                    <h2 class="text-xl text-gray-800 font-bold">Projects</h2>
                </div>
                <div class="px-6 py-4">
                    content
                </div>
            </div>
            <div class="w-3/12 border-gray-200 border-l bg-white shadow-sm rounded-tr-md">
                <div class="px-6 py-4">
                    <h2 class="text-xl text-gray-800 font-bold">Activity</h2>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
