<template>
   <Box>
      <template #header>
         Upload new Images
      </template>
      <form 
         method="POST"
         @submit.prevent="upload"
      >
         <input 
            type="file" 
            multiple
            @input="addFiles"
         />
         <button class="btn-outline" type="submit">Send</button>
         <button class="btn-outline" @click="reset" type="reset">Reset</button>
      </form>
   </Box>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue"
import { useForm } from "@inertiajs/vue3"

const props = defineProps({
   listing: Object
})

const formData = useForm({
   images: []
})

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