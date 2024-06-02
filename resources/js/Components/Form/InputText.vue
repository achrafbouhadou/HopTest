<template>
  <div class="mb-4">
    <label :for="id" class="block text-gray-700">{{ label }}</label>
    <input
      :id="id"
      :type="type"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      :class="['w-full p-2 border', error ? 'border-red-500' : 'border-gray-300', 'rounded']"
    />
    <InputError :message="error" v-if="error" />
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import InputError from './InputError.vue';

const props = defineProps({
  id: String,
  label: String,
  type: {
    type: String,
    default: 'text',
  },
  modelValue: [String, Number],
  error: String,
});
</script>
