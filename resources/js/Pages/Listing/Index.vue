<template>
   <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
      <Box 
         v-for="listing in listings"
         :key="listing.id"
      >
         <div>
            <Link :href="route('listing.show', listing.id)">
               <ListingSpace :listing="listing" />
               <ListingAddress :listing="listing" class="text-gray-500" />
            </Link>
         </div>
         <div>
            <Link :href="route('listing.edit', listing.id)">Edit</Link>
         </div>
         <div>
            <Link as="button" :href="route('listing.destroy', listing.id)" method="DELETE">Delete</Link>
         </div>
      </Box>
   </div>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue"
import Box from "@/Components/UI/Box.vue"
import ListingSpace from "@/Components/UI/ListingSpace.vue"
import { Link } from "@inertiajs/vue3"
defineProps({
   "listings": Array
})
</script>