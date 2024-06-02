<template>
  <div class="flex justify-between items-center mt-4">
    <div class="text-sm text-gray-600">
      Showing {{ startItem }} to {{ endItem }} of {{ totalResults }} results
    </div>
    <div class="flex space-x-1">
      <button
        @click="changePage(currentPage - 1)"
        :disabled="currentPage === 1"
        class="px-3 py-1 rounded border bg-gray-200 hover:bg-gray-300"
      >
        &lt;
      </button>
      <button
        v-for="page in pages"
        :key="page"
        @click="changePage(page)"
        :class="[
          'px-3 py-1 rounded border',
          page === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300'
        ]"
      >
        {{ page }}
      </button>
      <button
        @click="changePage(currentPage + 1)"
        :disabled="currentPage === totalPages"
        class="px-3 py-1 rounded border bg-gray-200 hover:bg-gray-300"
      >
        &gt;
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
  totalResults: Number,
  resultsPerPage: Number,
  currentPage: Number,
});

const emit = defineEmits(['update:currentPage']);

const totalPages = computed(() => Math.ceil(props.totalResults / props.resultsPerPage));
const startItem = computed(() => (props.currentPage - 1) * props.resultsPerPage + 1);
const endItem = computed(() => Math.min(props.currentPage * props.resultsPerPage, props.totalResults));

const changePage = (page) => {
  if (page >= 1 && page <= totalPages.value) {
    emit('update:currentPage', page);
  }
};

const pages = computed(() => {
  const maxPagesToShow = 7;
  const pages = [];
  const half = Math.floor(maxPagesToShow / 2);

  if (totalPages.value <= maxPagesToShow) {
    for (let i = 1; i <= totalPages.value; i++) {
      pages.push(i);
    }
  } else {
    let start = Math.max(1, props.currentPage - half);
    let end = Math.min(totalPages.value, props.currentPage + half);

    if (props.currentPage <= half) {
      end = maxPagesToShow;
    }

    if (props.currentPage + half >= totalPages.value) {
      start = totalPages.value - maxPagesToShow + 1;
    }

    for (let i = start; i <= end; i++) {
      pages.push(i);
    }

    if (start > 2) {
      pages.unshift('...');
      pages.unshift(1);
    } else if (start === 2) {
      pages.unshift(1);
    }

    if (end < totalPages.value - 1) {
      pages.push('...');
      pages.push(totalPages.value);
    } else if (end === totalPages.value - 1) {
      pages.push(totalPages.value);
    }
  }

  return pages;
});
</script>

<style scoped>
button[disabled] {
  cursor: not-allowed;
  opacity: 0.5;
}
</style>
