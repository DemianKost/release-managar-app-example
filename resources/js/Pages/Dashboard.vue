<script setup>
import { computed, defineProps, ref, reactive } from 'vue';
import { usePage, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const page = usePage();
const user = computed(() => {
    return page.props.auth.user;
});

const open = ref(false);

const form = useForm({
    title: null,
    description: null,
    active: true,
});

function submit() {
    form.post( this.$route('app:projects:store') );
}

defineProps({
    projects: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div v-if="open" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <form class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Add new project</h3>
                                    <div class="mt-2">
                                        <div class="mb-2">
                                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                            <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                            <textarea type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required></textarea>
                                        </div>
                                        <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mx-auto px-8 py-8 flex flex-wrap">
            <div class="w-3/12 px-6 py-8 border-gray-200 border-r bg-white shadow-sm rounded-tl-md">
                <div class="flex items-center gap-x-4">
                    <div class="w-2/6">
                        <div class="flex items-center justify-center text-2xl bg-green-500 rounded-full w-16 h-16">🐸</div>
                    </div>
                    <div class="w-4/6">
                        <h2 class="text-gray-800 text-lg font-semibold mb-1">{{ user.name }}</h2>
                        <p class="text-gray-700 text-sm">{{ user.email }}</p>
                    </div>
                </div>
                <div class="mt-6 mb-6 flex flex-col">
                    <a href="#" @click="open = !open" class="rounded-md font-light shadow-md bg-purple-500 px-4 py-2 text-center text-white uppercase w-full mb-4">New Project</a>
                    <a href="#" class="rounded-md font-light shadow-md border border-gray-100 bg-transparent px-4 py-2 text-center text-gray-700 uppercase w-full">New Task</a>
                </div>
                <div>
                    <div class="flex items-center text-sm text-gray-500 gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>
                        <span>{{ projects.length }} Projects</span>
                    </div>
                </div>
            </div>
            <div class="w-6/12 bg-white shadow-sm">
                <div class="border-gray-200 border-b px-6 py-4">
                    <h2 class="text-xl text-gray-800 font-bold">Projects</h2>
                </div>
                <div class="px-6 py-4">
                    
                    <ul role="list" class="divide-y divide-gray-100">
                        <li v-for="project in projects" :key="project.uuid" class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <!-- <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ project.title }}</p>
                                    <!-- <p class="mt-1 truncate text-xs leading-5 text-gray-500">dries.vincent@example.com</p> -->
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-500">Last deploy</p>
                                <div class="mt-1 flex items-center gap-x-1.5">
                                    <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                        <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-500">Online</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="w-3/12 border-gray-200 border-l bg-white shadow-sm rounded-tr-md">
                <div class="px-6 py-4">
                    <h2 class="text-xl text-gray-800 font-bold">Activity</h2>
                </div>
                <ul role="list" class="px-6 divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-8 w-8 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">Some activity</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <div class="mt-1 flex items-center gap-x-1.5">
                                    <p class="text-xs leading-5 text-gray-500">1h</p>
                                </div>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </AppLayout>
</template>
