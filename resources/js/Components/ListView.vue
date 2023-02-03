<template>
    <div class="mt-1 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="text-center items-center justify-center space-y-3 md:text-lg">
                <div v-for="(item, index) in items" :key="index">
                    <list-item :item="item" class="item" v-on:itemchanged="$emit('reloadlist')"/>
                </div>
            </div>    
        </div>
    </div>
</template>
<script>
import listItem from '@/Components/ListItem.vue';
import ListItem from '@/Components/ListItem';

export default {
    props: ['items'],
    components: {
        listItem
    }
}
</script>