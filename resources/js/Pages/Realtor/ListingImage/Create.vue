<template>
   <Box>
      <template #header>
         Upload new Images
      </template>
      <form 
         method="POST"
         @submit.prevent="upload"
      >
         <section class="flex items-center gap-2 my-4">
            <input 
               class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-gray-100 dark:file:bg-gray-800 file:font-medium file:hover:bg-gray-200 file:dark:hover:dark-gray-700 file:hover:cursor-pointer file:mr-4"
               type="file" 
               multiple
               @input="addFiles"
            />
            <button 
               class="btn-outline disabled:opacity-30 disabled:cursor-not-allowed" 
               type="submit"
               :disabled="canUpload"
            >
               Upload
            </button>
            <button 
               class="btn-outline" 
               @click="reset" 
               type="reset"
            >
               Reset
            </button>
         </section>
      </form>
   </Box>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue"
import { useForm } from "@inertiajs/vue3"
import { computed } from "vue";

const props = defineProps({
   listing: Object
})

const formData = useForm({
   images: []
})

const canUpload = computed(() => formData.images.length)

const upload = () => {
   formData.post(
      route("realtor.listing.image.store", {
         listing: props.listing.id
      }),
      {
         onSuccess: () => formData.reset("images")
      }
   )
}

const addFiles = (event) => {
   for(const image of event.target.files) {
      formData.images.push(image)
   }
}

const reset = () => formData.reset("images")
</script>