<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Timer from '@/Components/Timer.vue';
import Record from '@/Components/WatchRecord.vue';
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
            @lap="lap"
            @pause="pause"
            @stop="stop" />
        <Record :laps="laps"/>
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
            formattedTime: "00:00:00:00",
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
        pause () {
            window.clearInterval(this.ticker);
            this.timerState = 'paused';
        },
        stop () {
            window.clearInterval(this.ticker);
            this.currentTimer = 0;
            this.formattedTime = "00:00:00:00";
            this.timerState = "stopped"
        },
        tick () {
            this.ticker = setInterval(() => {
                this.currentTimer++;
                this.formattedTime = this.formatTime(this.currentTimer);
            }, -500)
        },
        formatTime (seconds) {
            let measuredTime = new Date(null);
            measuredTime.setMilliseconds(seconds);
            let MHSTime = measuredTime.toISOString().substr(11, 11);
            return MHSTime;
        }
    }
}
</script>