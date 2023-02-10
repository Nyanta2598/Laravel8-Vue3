<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
<template>
<div class="modal-backdrop">
    <div class="relative w-full h-full max-w-2xl md:h-auto bg-white rounded-lg shadow dark:bg-gray-700">
        <header class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
            <slot name="header">
                <h1 class="text-2xl font-extrabold dark:text-white">Balance</h1>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" @click="close">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </slot>
        </header>
        <section class="p-6 space-y-1">
            <slot name="body">
                <div class="mb-6">
                    <label for="default-input" class="text-xl font-extrabold dark:text-white">Add Balance</label>
                    <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </slot>
        </section>
        <footer class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <slot name="footer">
                <button
                    type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    @click=""
                >
                    Add
                </button>
            </slot>
        </footer>
    </div>
</div>
</template>
<script>
  export default {
    name: 'AddAmount',
    data() {
      return {
      }
    },
    methods: {
      close() {
        this.$emit('close');
      },
    },
  };
</script>