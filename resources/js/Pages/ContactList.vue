<template>
  <div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Liste des contacts</h1>
    <div class="flex justify-between items-center mb-4">
      <div class="flex-grow mr-4">
        <ContactSearchBar :initialSearch="search" />
      </div>
      <button @click="openCreateModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Ajouter</button>
    </div>
    <ContactTable 
      :contacts="contacts.data" 
      :sortBy="sortBy" 
      :sortDirection="sortDirection" 
      @edit="openEditModal" 
      @delete="handleDeleteContact" 
      @sort="handleSort"
    />
    <Pagination 
      :pagination="contacts" 
    />
    <ContactFormModal v-if="showModal" :contact="selectedContact" :errors="formErrors" @close="closeModal" />
    <DeletConfirmation 
      v-if="showConfirmation" 
      @confirmDelete="ConfirmDeleteContact" 
      @closeModal="showConfirmation = false"  
      :deleting="deleting"
      :confirm-title="'Supprimer le contact'"
      :confirm-description="'Êtes-vous sûr de vouloir supprimer ce contact? Cette opération est irréversible.'"
    />
  </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import ContactSearchBar from '@/Components/ContactSearchBar.vue';
import ContactTable from '@/Components/ContactTable.vue';
import Pagination from '@/Components/Pagination.vue';
import DeletConfirmation from '@/Components/DeletConfirmation.vue';
import ContactFormModal from '@/Components/Form/ContactFormModal.vue';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const page = usePage();

const  props  = defineProps({
  contacts: Object,
  search: String,
  sortBy: String,
  sortDirection: String,
  currentPage: Number
});

const showModal = ref(false);
const showConfirmation = ref(false);
const deleting = ref(false);
const selectedContact = ref({});
const formErrors = ref({});
const sortBy = ref(props.sortBy || 'last_name');
const sortDirection = ref(props.sortDirection || 'asc');
const currentPage = ref(props.currentPage || 1);

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

const closeModal = () => {
  showModal.value = false;
};

const idToDelete = ref(null);
const handleDeleteContact = async (id) => {
  showConfirmation.value = true;
  idToDelete.value = id;
};

const ConfirmDeleteContact = () => {
  router.delete(route('contacts.destroy', idToDelete.value), { preserveScroll: true })
    .then(() => {
      showConfirmation.value = false;
      toast.success('Contact supprimé avec succès.');
    })
    .catch(() => {
      showConfirmation.value = false;
      toast.error('Erreur lors de la suppression du contact.');
    });
};

const handleSort = ({ field, direction }) => {
  sortBy.value = field;
  sortDirection.value = direction;
  router.get(route('contacts.index'), { search: props.search, sortBy: field, sortDirection: direction, page: currentPage.value }, { preserveScroll: true });
};

watch(() => page.props.flash.success, (newMessage) => {
  if (newMessage) {
    toast(newMessage, {
      "theme": "auto",
      "type": "success",
      "dangerouslyHTMLString": true
    });
  }
});

watch(() => page.props.errors, (newMessage) => {
  if (newMessage.message) {
    toast(newMessage.message, {
      "theme": "auto",
      "type": "error",
      "dangerouslyHTMLString": true
    });
  }
});

onMounted(() => {
  if (page.props.flash.success) {
    toast(page.props.flash.success, {
      "theme": "auto",
      "type": "success",
      "dangerouslyHTMLString": true
    });
  }
  if (page.props.errors) {
    if (page.props.errors.message) {
      toast(page.props.errors.message, {
        "theme": "auto",
        "type": "error",
        "dangerouslyHTMLString": true
      });
    }
  }
});
</script>
