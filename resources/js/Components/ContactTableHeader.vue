<template>
  <thead>
    <tr>
      <th @click="sort('last_name')" class="p-2 border-b text-left text-sm font-semibold text-gray-600 cursor-pointer">
        Nom du contact
        <span v-if="sortBy === 'last_name'">{{ sortDirection === 'asc' ? '↑' : '↓' }}</span>
      </th>
      <th @click="sort('company')" class="p-2 border-b text-left text-sm font-semibold text-gray-600 cursor-pointer">
        Société
        <span v-if="sortBy === 'company'">{{ sortDirection === 'asc' ? '↑' : '↓' }}</span>
      </th>
      <th @click="sort('status')" class="p-2 border-b text-left text-sm font-semibold text-gray-600 cursor-pointer">
        Statut
        <span v-if="sortBy === 'status'">{{ sortDirection === 'asc' ? '↑' : '↓' }}</span>
      </th>
      <th class="p-2 border-b text-left text-sm font-semibold text-gray-600">Actions</th>
    </tr>
  </thead>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
  sortBy: String,
  sortDirection: String,
});

const emit = defineEmits(['sort']);

const sort = (field) => {
  emit('sort', field);
};
</script>
