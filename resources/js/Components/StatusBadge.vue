<template>
    <span :class="badgeClass">{{ status }}</span>
  </template>
  
  <script setup>
  import { computed } from 'vue';
  import { defineProps } from 'vue';
  
  const props = defineProps({
    status: String
  });
  
  const badgeClass = computed(() => {
  return [
    'inline-block px-3 py-1 rounded-full text-xs font-semibold',
    props.status === 'Lead' ? 'bg-blue-100 text-blue-800' :
    props.status === 'Client' ? 'bg-green-100 text-green-800' :
    props.status === 'Prospect' ? 'bg-orange-100 text-orange-800' :
    'bg-gray-100 text-gray-800'
  ];
});
  </script>
  