<template>
  <div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="bg-white rounded-lg shadow-lg p-6 z-10 max-w-lg w-full my-auto max-h-screen overflow-y-auto">
      <h2 class="text-2xl font-bold mb-4">{{ form.id ? 'Modifier' : 'Ajouter' }} un contact</h2>
      <form  class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
          <InputText id="first_name" label="Prénom" v-model="form.first_name" :error="form.errors.first_name" />
          <InputText id="last_name" label="Nom" v-model="form.last_name" :error="form.errors.last_name" />
        </div>
        <InputText id="email" label="Email" type="email" v-model="form.email" :error="form.errors.email" />
        <InputText id="company" label="Entreprise" v-model="form.company" :error="form.errors.company" />
        <div class="mb-4">
          <label for="address" class="block text-gray-700">Adresse</label>
          <textarea
            id="address"
            v-model="form.address"
            :class="['w-full p-2 border', form.errors.address ? 'border-red-500' : 'border-gray-300', 'rounded']"
            rows="3"
          ></textarea>
          <InputError :message="form.errors.address" v-if="form.errors.address" />
        </div>
        <div class="grid grid-cols-2 gap-4">
          <InputText id="postal_code" label="Code postal" v-model="form.postal_code" :error="form.errors.postal_code" />
          <InputText id="city" label="Ville" v-model="form.city" :error="form.errors.city" />
        </div>
        <div class="mb-4">
          <label for="status" class="block text-gray-700">Statut</label>
          <select v-model="form.status" id="status" class="w-full p-2 border border-gray-300 rounded">
            <option value="Lead">Lead</option>
            <option value="Client">Client</option>
            <option value="Prospect">Prospect</option>
          </select>
          <InputError :message="form.errors.status" v-if="form.errors.status" />
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" @click="close" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</button>
          <button @click="handleSubmit" class="bg-blue-500 text-white px-4 py-2 rounded" :disabled="form.processing">Valider</button>
        </div>
      </form>
    </div>
  </div>

</template>

<script setup>
import { ref, watch, defineProps, defineEmits ,onMounted} from 'vue';
import { useForm,usePage } from '@inertiajs/vue3';
import InputText from './InputText.vue';
import InputError from './InputError.vue';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
const page = usePage()
const props = defineProps({
  contact: {
    type: Object,
    default: () => ({
      first_name: '',
      last_name: '',
      email: '',
      company: '',
      address: '',
      postal_code: '',
      city: '',
      status: 'Lead',
    }),
  },
});

const emit = defineEmits(['close']);

const form = useForm({ ...props.contact });

const close = () => emit('close');

const handleSubmit = () => {
  if (form.id) {
    form.put(`/contacts/${form.id}`, {
      onSuccess: () =>{
        close()
      } 
    });
  } else {
    form.post('/contacts', {
      onSuccess: () =>{
       
        close()
        
        }
    });
  }
};

watch(() => props.contact, (newContact) => {
  form.reset({ ...newContact });
});


</script>
