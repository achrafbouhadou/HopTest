<template>
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
      <ContactTableHeader />
      <tbody>
        <ContactTableRow
          v-for="contact in paginatedContacts"
          :key="contact.id"
          :contact="contact"
        />
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { computed , ref } from 'vue';
import { defineProps } from 'vue';
import ContactTableHeader from '@/Components/ContactTableHeader.vue';
import ContactTableRow from '@/Components/ContactTableRow.vue';

const props = defineProps({
  currentPage: Number,
  resultsPerPage: Number,
});

const contacts = ref([
  { id: 1, name: 'Arthur Martins', company: 'Andre Mercier S.A.R.L.', status: 'Lead' },
]);

const paginatedContacts = computed(() => {
  const start = (props.currentPage - 1) * props.resultsPerPage;
  const end = start + props.resultsPerPage;
  return contacts.value.slice(start, end);
});
</script>
