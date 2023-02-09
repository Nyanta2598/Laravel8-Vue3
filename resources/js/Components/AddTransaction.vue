<template>
    <div class="modal-backdrop">
        <div class="relative w-full h-full max-w-2xl md:h-auto bg-white rounded-lg shadow dark:bg-gray-700">
            <header class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <slot name="header">
                    <h1>Add Transaction</h1>
                    
                </slot>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    @click="close"
                >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                </button>
            </header>
  
            <section class="p-6 space-y-1">
                <slot name="body">
                    <h1 class="text-2xl font-extrabold dark:text-white">Select transaction type:</h1>
                    <button @click="incomeShow"  :class="income?'text-white bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300':''" class="border border-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">   
                        Income
                    </button>
                    <button @click="expenseShow" :class="expense?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''"  class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Expense
                    </button>
                    <div id="income" v-if="income" >
                        <h1 class="text-2xl font-extrabold dark:text-white">Select income category:</h1>
                        <input @click="salaryShow" :class="salary?'text-white bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300':''" class="border border-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" type="button" value="Salary">
                        <input @click="allowanceShow" :class="allowance?'text-white bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300':''" class="border border-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" type="button" value="Allowance">
                        <input @click="businessShow" :class="business?'text-white bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300':''" class="border border-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" type="button" value="Business">
                        <input @click="savingsShow" :class="savings?'text-white bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300':''" class="border border-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" type="button" value="Savings">
                        <input @click="othersShow" :class="others?'text-white bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300':''" class="border border-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" type="button" value="Others">
                        <h1 class="text-2xl font-extrabold dark:text-white">Income Amount:</h1>
                        <div v-if="salary" class="flex items-center">
                            <input placeholder="Salary" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-800 focus:border-green-800 block w-5/6 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Add </button>
                        </div>
                        <div v-else-if="allowance" class="flex items-center">
                            <input placeholder="Allowance" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-800 focus:border-green-800 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Add </button>
                        </div>
                        <div v-else-if="business" class="flex items-center">
                            <input placeholder="Business" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-800 focus:border-green-800 block w-5/6 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Add </button>
                        </div>
                        <div v-else-if="savings" class="flex items-center">
                            <input placeholder="Savings" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-800 focus:border-green-800 block w-5/6 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Add </button>
                        </div>
                        <div v-else-if="others" class="flex items-center">
                            <input placeholder="Others" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-800 focus:border-green-800 block w-5/6 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Add </button>
                        </div>
                    </div>
                    <div id="expense" v-else-if="expense">
                        <h1 class="text-2xl font-extrabold dark:text-white">Select expense category:</h1>
                        <input @click="foodShow" :class="food?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Food">
                        <input @click="transportationShow" :class="transportation?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Transportation">
                        <input @click="homeShow" :class="home?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Home">
                        <input @click="electricityShow" :class="electricity?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Electricity">
                        <input @click="utilitiesShow" :class="utilities?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Utilities">
                        <input @click="healthcareShow" :class="healthcare?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Health Care">
                        <input @click="creditsShow" :class="credits?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Creadits">
                        <input @click="otherShow" :class="other?'text-white bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300':''" class="border border-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800" type="button" value="Others">
                    </div>
                    
                    
                </slot>
            </section>
  
            <!-- <footer class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <slot name="footer">
                    
                </slot>
                <button
                    type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    @click=""
                >
                    Add
                </button>
                <button
                    type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    @click="close"
                >
                    Cancel
                </button>
            </footer> -->
        </div>
    </div>
</template>
<script>
import { faL } from '@fortawesome/free-solid-svg-icons';

  export default {
    name: 'Modal',
    data() {
        return {
            income: false,
            expense: false,
            salary: false,
            allowance: false,
            business: false,
            savings: false,
            others: false,
            food: false,
            transportation: false,
            home: false,
            electricity: false,
            utilities: false,
            healthcare: false,
            credits: false,
            other: false
        }
    },
    methods: {
      close() {
        this.$emit('close');
      },
    // Methods that are triggered by clicking the corresponding buttons
      incomeShow() {
        this.income = !this.income;
        this.expense = false;
      },
      expenseShow() {
        this.expense = !this.expense;
        this.income = false;
      },
      salaryShow() {
        this.salary = !this.salary;
        this.allowance = false;
        this.business = false;
        this.savings = false;
        this.others = false;
      },
      allowanceShow() {
        this.allowance = !this.allowance;
        this.salary = false;
        this.business = false;
        this.savings = false;
        this.others = false;
      },
      businessShow() {
        this.business = !this.business;
        this.salary = false;
        this.allowance = false;
        this.savings = false;
        this.others = false;
      },
      savingsShow() {
        this.savings = !this.savings;
        this.salary = false;
        this.allowance = false;
        this.business = false;
        this.others = false;
      },
      othersShow() {
        this.others = !this.others;
        this.salary = false;
        this.allowance = false;
        this.savings = false;
        this.business = false;
      },
      foodShow() {
        this.food = !this.food;
        this.transportation = false;
        this.home = false;
        this.electricity = false;
        this.utilities = false;
        this.healthcare = false;
        this.credits = false;
        this.other = false;
      },
      transportationShow() {
        this.transportation = !this.transportation;
        this.food = false;
        this.home = false;
        this.electricity = false;
        this.utilities = false;
        this.healthcare = false;
        this.credits = false;
        this.other = false;
      },
      homeShow() {
        this.home = !this.home;
        this.transportation = false;
        this.food = false;
        this.electricity = false;
        this.utilities = false;
        this.healthcare = false;
        this.credits = false;
        this.other = false;
      },
      electricityShow() {
        this.electricity = !this.electricity;
        this.transportation = false;
        this.home = false;
        this.food = false;
        this.utilities = false;
        this.healthcare = false;
        this.credits = false;
        this.other = false;
      },
      utilitiesShow() {
        this.utilities = !this.utilities;
        this.transportation = false;
        this.home = false;
        this.electricity = false;
        this.food = false;
        this.healthcare = false;
        this.credits = false;
        this.other = false;
      },
      healthcareShow() {
        this.healthcare = !this.healthcare;
        this.transportation = false;
        this.home = false;
        this.electricity = false;
        this.food = false;
        this.utilities = false;
        this.credits = false;
        this.other = false;
      },
      creditsShow() {
        this.credits = !this.credits;
        this.transportation = false;
        this.home = false;
        this.electricity = false;
        this.food = false;
        this.healthcare = false;
        this.utilities = false;
        this.other = false;
      },
      otherShow() {
        this.other = !this.other;
        this.transportation = false;
        this.home = false;
        this.electricity = false;
        this.food = false;
        this.healthcare = false;
        this.credits = false;
        this.utilities = false;
      },
    },
  };
</script>
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