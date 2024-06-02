<template>
  <div class="overflow-x-auto">
    <table v-if="contacts.length" class="min-w-full bg-white border border-gray-300">
      <ContactTableHeader @sort="sortTable" :sortBy="sortField" :sortDirection="sortOrder" />
      <tbody>
        <ContactTableRow
          v-for="contact in sortedContacts"
          :key="contact.id"
          :contact="contact"
          @edit="editContact(contact)"
          @delete="deleteContact(contact.id)"
          @view="viewContact(contact)"
        />
      </tbody>
    </table>
    <div v-else class="p-6 text-center text-gray-500">No records found</div>
  </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue';
import { defineProps, defineEmits } from 'vue';
import ContactTableHeader from '@/Components/ContactTableHeader.vue';
import ContactTableRow from '@/Components/ContactTableRow.vue';

const props = defineProps({
  contacts: Array,
  sortBy: String,
  sortDirection: String,
});

const emit = defineEmits(['edit', 'delete', 'sort','view']);

const sortField = ref(props.sortBy);
const sortOrder = ref(props.sortDirection);

const sortTable = (field) => {
  
  if (sortField.value === field) {
    sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc';
  } else {
    sortField.value = field;
    sortOrder.value = 'asc';
  }
  emit('sort', { field: sortField.value, direction: sortOrder.value });
};

const sortedContacts = computed(() => {
  return [...props.contacts].sort((a, b) => {
    if (sortOrder.value === 'asc') {
      return a[sortField.value] > b[sortField.value] ? 1 : -1;
    } else {
      return a[sortField.value] < b[sortField.value] ? 1 : -1;
    }
  });
});

watch(() => props.sortBy, (newValue) => {
  sortField.value = newValue;
});

watch(() => props.sortDirection, (newValue) => {
  sortOrder.value = newValue;
});

const editContact = (contact) => {
  emit('edit', contact);
};

const deleteContact = (id) => {
  emit('delete', id);
};
const viewContact = (contact) => {
  emit('view', contact);
};
</script>
