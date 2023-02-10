<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>
<template>
    <Head title="TrackerSavings" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Expense</span> Tracker
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" px-3 py-2 bg-gray-700 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                        <select v-model="selectedCurrency" @change="convertCurrency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option v-for="currency in currencies" :key="currency.value" :value="currency.value">
                                {{ currency.text }}
                            </option>
                        </select>
                        <h1 class=" font-bold text-2xl text-white">Account Balance:</h1>
                        <h1  class="font-bold text-2xl text-white">{{ convertedAmount }}</h1>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200 flex items-center">
                        
                        <button type="button" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @click="showTransaction">
                            Add Transaction
                        </button>
                        <button type="button" class=" ml-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @click="showModal">
                            Add Balance
                        </button>
                        <AddTransaction v-show="isTransactionVisible" @close="closeTransaction">
                            <template v-slot:header>
                            
                            </template>
                            <template v-slot:body>
                            
                            </template>
                            <template v-slot:footer>
                            
                            </template>
                        </AddTransaction>
                        <AddAmount v-show="isModalVisible" @close="closeModal">
                            <template v-slot:header>
                            
                            </template>
                            <template v-slot:body>
                            
                            </template>
                            <template v-slot:footer>
                            
                            </template>
                        </AddAmount>
                    </div>
                </div>
            </div>
        </div>
        <PieChartCashFlow />
    </BreezeAuthenticatedLayout>
</template>
<script>
import AddTransaction  from '@/Components/AddTransaction.vue';
import AddAmount from '@/Components/AddAmount.vue';
import PieChartCashFlow from '@/Components/PieChartCashFlow.vue';

export default {
    name: 'App',
    components: {
        AddTransaction,
        AddAmount,
    },
    data() {
      return {
        isTransactionVisible: false,
        isModalVisible: false,
        selectedCurrency: "USD",
        amount: 100,
        currencies: [
        { text: "USD", value: "USD" },
        { text: "PHP", value: "PHP" },
        { text: "EUR", value: "EUR" },
        { text: "GBP", value: "GBP" },
        ],
        exchangeRates: {
            USD: 1,
            EUR: 0.8,
            GBP: 0.7,
            PHP: 54.5,
        }
      };
    },
    computed: {
        convertedAmount() {
            return (
                this.amount * this.exchangeRates[this.selectedCurrency] + " " + this.selectedCurrency
            );
        }
    },
    methods: {
      showTransaction () {
        this.isTransactionVisible = true;
      },
      closeTransaction () {
        this.isTransactionVisible = false;
      },
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      },
      convertCurrency() {
        console.log(this.selectedCurrency);
      }
    }
  };
</script>