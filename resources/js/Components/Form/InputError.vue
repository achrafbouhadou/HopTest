<template>
    <p class="text-red-500 text-xs mt-1">{{ message }}</p>
  </template>
  
  <script setup>
  defineProps({
    message: String,
  });
  </script>
  