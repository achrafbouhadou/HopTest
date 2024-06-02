<template>
  <div>
    <input
      ref="searchInput"
      v-model="search"
      @input="performSearch"
      type="text"
      placeholder="Rechercher..."
      class="w-full p-2 border border-gray-300 rounded"
    />
  </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  initialSearch: String,
});

const search = ref(props.initialSearch || '');
const searchInput = ref(null);

const performSearch = () => {
  router.get('contacts', { search: search.value }, { preserveScroll: true });
};

onMounted(() => {
  searchInput.value.focus();
});

watch(search, () => {
  searchInput.value.focus();
});
</script>
