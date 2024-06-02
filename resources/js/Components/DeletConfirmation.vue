<template>
    <!-- Modal -->
    <div  tabindex="-1" aria-hidden="true" class=" overflow-y-auto flex  overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black opacity-50"></div>

    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <svg class="w-12 h-12 mr-5 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ confirmTitle }}
                </h3>
                <button @click="emits('closeModal')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{confirmDescription}}
                </p>
            
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button @click="emits('confirmDelete')"  type="button" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Confirmer</button>
                <button @click="emits('closeModal')"  type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 ">Decline</button>
            </div>
        </div>
    </div>
</div>
  </template>
  
  <script setup>
  const props = defineProps(
      {
        confirmTitle: {
          type: String,
          default: () => ''
        },
        confirmDescription: {
          type: String,
          default:() => ''
        },
        deleting: {
          type: Boolean,
          default: () => false
        },
    
      }
  )
  
  const emits = defineEmits(['confirmDelete','closeModal'])
  </script>
  
  <style scoped lang="scss">
  .trash-wrapper {
    border-radius: 1.75rem;
    border: 8px solid #FEF3F2;
    background: #FEE4E2;
    display: flex;
    width: 3rem;
    height: 3rem;
    padding: 0.75rem;
    justify-content: center;
    align-items: center;
  
    i {
      color: #D92D20;
      font-size: 1.25rem;
    }
  }
  
  @media (min-width: 576px) {
  
    .dialog-sm {
      max-width: 25rem;
    }
  }
  
  .confirmation-title {
    font-size: 1.125rem;
    font-weight: 600;
  }
  
  .confirmation-description {
    font-size: 0.875rem;
  }
  
  .btn-actions {
    gap: 0.75rem;
  
    margin-top: 2rem;
  
    .btn {
      flex: 1 0 0;
      padding: 0.625rem 1.125rem;
      font-weight: 600;
    }
  }
  </style>
  