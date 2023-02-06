<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span v-for="(lap, index) in laps" :key="index" class="text-center">
                        <p class="text-indigo-400">Lap {{ index + 1 }}: {{ lap.formattedTime }}</p>
                    </span>  
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Record',
    props: ['laps'],
    data () {
        return{

        }
    }
}
</script>