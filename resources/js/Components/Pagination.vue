<template>
  <div class="flex justify-between items-center mt-4">
    <div class="text-sm text-gray-600">
      Showing {{ startItem }} to {{ endItem }} of {{ totalResults }} results
    </div>
    <div class="flex space-x-1">
      <Link
        v-for="link in pagination.links"
        :key="link.label"
        :href="link.url"
        v-html="link.label"
        :class="[
          'px-3 py-1 rounded border',
          link.active ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300',
          link.url ? '' : 'cursor-not-allowed opacity-50'
        ]"
      ></Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps, computed } from 'vue';

const props = defineProps({
  pagination: Object,
});

const startItem = computed(() => (props.pagination.current_page - 1) * props.pagination.per_page + 1);
const endItem = computed(() => Math.min(props.pagination.current_page * props.pagination.per_page, props.pagination.total));
const totalResults = computed(() => props.pagination.total);
</script>

<style scoped>
button[disabled] {
  cursor: not-allowed;
  opacity: 0.5;
}
</style>
