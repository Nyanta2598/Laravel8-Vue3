<template>
    <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="text-center items-center justify-center  md:text-lg">
                <input type="text" v-model="item.name" placeholder="Write Task" class="bg-gray-200/70 border drop-shadow-sm shadow-gray-700 rounded-md placeholder-slate-400 px-4   focus:outline-none ">
                <font-awesome-icon icon="plus-square" @click="addItem()" :class="[ item.name ? 'active' : 'inactive', 'plus']"/>
            </div>    
        </div>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            item: {
                name: ""
            }
        }
    },
    methods: {
        addItem() {
            if( this.item.name == '' ){
                return;
            }

            axios.post('api/item/store', {
                item: this.item
            })
            .then ( response => {
                if ( response.status == 201 ){
                    this.item.name == "";
                    this.$emit('reloadlist');
                }
            })
            .catch( error => {
                console.log( error );
            })
        }
    }
}
</script>
<style scoped>
    .plus {
        font-size: 25px;
        margin-left: 12px;
        text-justify: auto;
    }
    .active {
        color: #007FFF;
    }
    .inactive {
        color: black;
    }
</style>