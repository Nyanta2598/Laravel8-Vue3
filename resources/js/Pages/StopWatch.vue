<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Timer from '@/Components/Timer.vue';
</script>
<template>
    <!-- link https://www.youtube.com/watch?v=bvZyC9HfAOI -->
    <Head title="StopWatch" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Stop Watch
            </h2>
        </template>
        <Timer 
            :timer="formattedTime"
            :state="timerState" 
            @start="start" 
            @lap="lap" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
export default {
    name: 'StopWatch',
    components: {
        Timer
    },
    data: function () {
        return {
            timerState: 'stopped',
            currentTimer: 0,
            formattedTime: "00:00:00",
            ticker: undefined,
            laps: [],
            latestLap: "",
            snackbar: false
        }
    },
    methods: {
        start () {
            if (this.timerState !== 'running') {
                this.tick();
                this.timerState = 'running';
            }
            // console.log("Start");
        },
        lap () {
            this.laps.push({
                seconds: this.currentTimer,
                formattedTime: this.formatTime(this.currentTimer)
            });
            this.latestLap = this.formatTime(this.currentTimer);
            this.currentTimer = 0;
        },
        tick () {
            this.ticker = setInterval(() => {
                this.currentTimer++;
                this.formattedTime = this.formatTime(this.currentTimer);
            }, 250)
        },
        formatTime (seconds) {
            let measuredTime = new Date(null);
            measuredTime.setSeconds(seconds);
            let MHSTime = measuredTime.toISOString().substr(11, 8);
            return MHSTime;
        }
    }
}
</script>