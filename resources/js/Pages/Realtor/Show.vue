<template>
   <div class="mb-4">
      <Link :href="route('realtor.listing.index')">
         go back to listings
      </Link>
   </div>

   <section class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
      <Box 
         class="flex md:col-span-7 items-center"
         v-if="!hasOffers"
      >
         <div class="w-full text-centr font-medium text-gray-500">
            No offers
         </div>
      </Box>
      <div
         class="md:col-span-7 items-center"
         v-else
      >
         
      </div>
      <Box class="md:col-span-5">
         <template #header>Basic Info</template>
         <Price :price="listing.price" class="text2-xl font-bold"/>
         <ListingSpace :listing="listing" class="text-lg" />
         <ListingAddress :listing="listing" class="text-gray-500" />
      </Box>
   </section>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue"
import Price from "@/Components/Price.vue"
import Box from "@/Components/UI/Box.vue"
import ListingSpace from "@/Components/UI/ListingSpace.vue"
import { Link } from "@inertiajs/vue3"
import { computed } from "vue"

const props = defineProps({
   listing: Object
})
const hasOffers = computed(() => props.listing.offers.length)
</script>