<template>
<div class="min-w-screen min-w-fit bg-indigo-400 flex items-center justify-center px-5 py-5">
    <div class="text-6xl text-center flex w-full items-center justify-center">
        <div class="w-auto mx-1 p-2 bg-white text-indigo-400 rounded-lg">
            <div class="font-mono leading-none" x-text="days">{{ timer }}</div>
            <div class="font-mono uppercase text-sm leading-none">Timer</div>
        </div>
    </div>
</div>
<div class="mt-4 flex justify-center">
    <div class="inline-flex rounded-md shadow-sm" role="group">
        <button @click="$emit('start')" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-indigo-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-indigo-400 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
            <font-awesome-icon icon="fa-play" class="mr-2" />
            Start
        </button>
        <button @click="$emit('lap')" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-indigo-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-indigo-400 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
            <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
            Lap
        </button>
        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-b border-gray-900 hover:bg-indigo-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-indigo-400 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
            <font-awesome-icon icon="fa-pause" class="mr-2" />
            Pause
        </button>
        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-indigo-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-indigo-400 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
            <font-awesome-icon icon="fa-stop" class="mr-2" />
            Stop
        </button>
    </div>
</div>
</template>
<script>
export default {
    name: 'Timer',
    props: ['timer', 'state']
}
</script>