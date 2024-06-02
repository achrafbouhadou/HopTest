<template>
  <tr>
    <td class="p-2 border-b align-middle text-sm text-gray-800">{{ contact.first_name }} {{ contact.last_name }}</td>
    <td class="p-2 border-b align-middle text-sm text-gray-800">{{ contact.company }}</td>
    <td class="p-2 border-b align-middle text-sm text-gray-800"><StatusBadge :status="contact.status" /></td>
    <td class="p-2 border-b align-middle text-sm text-gray-800">
      <ActionButtons :contact="contact" @edit="$emit('edit', contact)" @delete="$emit('delete', contact.id)" @view="$emit('view', contact.id)"/>
    </td>
  </tr>
</template>

<script setup>
import { defineProps } from 'vue';
import StatusBadge from '@/Components/StatusBadge.vue';
import ActionButtons from '@/Components/ActionButtons.vue';

const props = defineProps({
  contact: Object,
});
</script>
