<template>
    <div class="fixed inset-0 flex items-center justify-center z-50">
      <div class="fixed inset-0 bg-black opacity-50"></div>
      <div class="bg-white rounded-lg shadow-lg p-6 z-10 max-w-lg w-full my-auto max-h-screen overflow-y-auto">
        <h2 class="text-2xl font-bold mb-4">Détail du contact</h2>
        <div class="space-y-4">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-700">Prénom</label>
              <p class="p-2 border border-gray-300 rounded">{{ contact.first_name }}</p>
            </div>
            <div>
              <label class="block text-gray-700">Nom</label>
              <p class="p-2 border border-gray-300 rounded">{{ contact.last_name }}</p>
            </div>
          </div>
          <div>
            <label class="block text-gray-700">Email</label>
            <p class="p-2 border border-gray-300 rounded">{{ contact.email }}</p>
          </div>
          <div>
            <label class="block text-gray-700">Entreprise</label>
            <p class="p-2 border border-gray-300 rounded">{{ contact.company }}</p>
          </div>
          <div>
            <label class="block text-gray-700">Adresse</label>
            <p class="p-2 border border-gray-300 rounded">{{ contact.address }}</p>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-700">Code postal</label>
              <p class="p-2 border border-gray-300 rounded">{{ contact.postal_code }}</p>
            </div>
            <div>
              <label class="block text-gray-700">Ville</label>
              <p class="p-2 border border-gray-300 rounded">{{ contact.city }}</p>
            </div>
          </div>
          <div>
            <label class="block text-gray-700">Statut</label>
            <p class="p-2 border border-gray-300 rounded">{{ contact.status }}</p>
          </div>
          <div class="flex justify-end space-x-2">
            <button type="button" @click="close" class="bg-gray-500 text-white px-4 py-2 rounded">Fermer</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps, defineEmits } from 'vue';
  
  const props = defineProps({
    contact: {
      type: Object,
      required: true,
    },
  });
  
  const emit = defineEmits(['close']);
  
  const close = () => emit('close');
  </script>
  