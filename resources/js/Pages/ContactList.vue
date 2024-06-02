<template>
  <div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Liste des contacts</h1>
    <div class="flex justify-between items-center mb-4">
      <div class="flex-grow mr-4">
        <ContactSearchBar :initialSearch="search" />
      </div>
      <button @click="openCreateModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Ajouter</button>
    </div>
    <ContactTable :contacts="contacts.data" @edit="openEditModal" @delete="handleDeleteContact" @view="openViewModal" />
    <Pagination :pagination="contacts"  />
    <ContactFormModal v-if="showModal" :contact="selectedContact" :errors="formErrors" @close="closeModal" />
    <ContactViewModal v-if="showViewModal" :contact="selectedContact" @close="closeViewModal" />
    <DeletConfirmation v-if="showConfirmation" @confirmDelete="ConfirmDeleteContact" @closeModal="showConfirmation = false"  :deleting="deleting"
                             :confirm-title="'Supprimer le contact'"
                             :confirm-description="'Êtes-vous sûr de vouloir supprimer ce contact? Cette opération est irréversible.'"/>
  </div>
</template>

<script setup>
import { ref,watch,onMounted } from 'vue';
import { router } from '@inertiajs/vue3'
import ContactSearchBar from '@/Components/ContactSearchBar.vue';
import ContactTable from '@/Components/ContactTable.vue';
import Pagination from '@/Components/Pagination.vue';
import DeletConfirmation from '@/Components/DeletConfirmation.vue';
import ContactFormModal from '@/Components/Form/ContactFormModal.vue';
import ContactViewModal from '@/Components/ContactViewModal.vue';
import { usePage } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
const page = usePage()

const  props  = defineProps({
  contacts:Object,
  search:String
})


const showModal = ref(false);
const showViewModal = ref(false);
const showConfirmation = ref(false)
const deleting = ref(false)
const selectedContact = ref({});
const formErrors = ref({});

const openCreateModal = () => {
  selectedContact.value = {
    first_name: '',
    last_name: '',
    email: '',
    company: '',
    address: '',
    postal_code: '',
    city: '',
    status: 'Lead',
  };
  showModal.value = true;
};

const openEditModal = (contact) => {
  selectedContact.value = { ...contact };
  showModal.value = true;
};

const openViewModal = (contact) => {
  console.log(contact)
  selectedContact.value = { ...contact };

  showViewModal.value = true;
};

const closeModal = () => {
  showModal.value = false;
};

const closeViewModal = () => {
  showViewModal.value = false;
};

const idToDelete = ref(null)
const handleDeleteContact = async (id) => {
  showConfirmation.value = true;
  idToDelete.value = id
  
};
const ConfirmDeleteContact = ()=>{
  router.delete('contacts/'+idToDelete.value, {preserveScroll: true})
  showConfirmation.value = false;
  
}
watch(() => page.props.flash.success, (newMessage) => {
  if (newMessage) {
    toast(newMessage, {
          "theme": "auto",
          "type": "success",
          "dangerouslyHTMLString": true
        })
  }
});

watch(() => page.props.errors, (newMessage) => {
  if (newMessage.message) {
    toast(newMessage.message, {
          "theme": "auto",
          "type": "error",
          "dangerouslyHTMLString": true
        })
  }
});
onMounted(() => {
  if (page.props.flash.success) {
    toast(page.props.flash.success, {
          "theme": "auto",
          "type": "success",
          "dangerouslyHTMLString": true
        })
  }
  if (page.props.errors) {
    if (page.props.errors.message) {
    toast(page.props.errors.message, {
          "theme": "auto",
          "type": "error",
          "dangerouslyHTMLString": true
        })
  }
  }
});
</script>
