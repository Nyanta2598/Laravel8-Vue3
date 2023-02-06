<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import addItemForm from '@/Components/AddItemForm.vue';
    import listView from '@/Components/ListView.vue'; 
</script>
<template>
    <Head title="TodoApplication" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todo Application
            </h2>
        </template>
        <div class="py-12">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <add-item-form v-on:reloadlist="getList()"/>
                    <list-view :items="items"  v-on:reloadlist="getList()"/>
                </div>
            </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
export default {
    components: {
        addItemForm,
        listView
    },
    data: function () {
        return {
            items: []
        }
    },
    methods: {
        getList () {
            axios.get('api/items')
            .then( response => {
                this.items = response.data
            })
            .catch( error => {
                console.log( error );
            })
        }
    },
    created() {
        this.getList();
    }
}
</script>