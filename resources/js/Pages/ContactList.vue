<template>
  <div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Liste des contacts</h1>
    <div class="flex justify-between items-center mb-4">
      <div class="flex-grow mr-4">
        <ContactSearchBar />
      </div>
      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Ajouter</button>
    </div>
    <ContactTable :currentPage="currentPage" :resultsPerPage="resultsPerPage" />
    <Pagination
      :totalResults="totalResults"
      :resultsPerPage="resultsPerPage"
      :currentPage="currentPage"
      @update:currentPage="currentPage = $event"
    />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import ContactSearchBar from '@/Components/ContactSearchBar.vue';
import ContactTable from '@/Components/ContactTable.vue';
import Pagination from '@/Components/Pagination.vue';

const totalResults = ref(242); // Total number of results
const resultsPerPage = ref(10); // Number of results per page
const currentPage = ref(1); // Current page
</script>
