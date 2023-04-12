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
   <Box v-if="listing.image.length" class="mt-4">
      <template #header>
         Current Listing Images
      </template>
      <section class="mt-4 grid grid-cols-3 gap-4">
         <div
            v-for="image in listing.images"
            :key="image.id"
            class="flex flex-col justify-between"
         >
            <img 
               :src="image.src" 
               class="rounded-md"
            >
            <Link 
               :href="route('realtor.listing.image.destroy', { 
                  listing: props.listing.id, 
                  image: image.id
               })"
               method="delete"
               as="button"
               class="mt-2 btn-outline text-xs"
            >
               Delete
            </Link>
         </div>
      </section>
   </Box>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue"
import { Link, router, useForm } from "@inertiajs/vue3"
import { computed } from "vue"
import NProgress from "nprogress"

const props = defineProps({
   listing: Object
})
router.on("progress", (event) => {
   if(event.detail.progress.percentage) {
      NProgress.set((event.detail.progress.percentage / 100) * 0.9)
   }
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