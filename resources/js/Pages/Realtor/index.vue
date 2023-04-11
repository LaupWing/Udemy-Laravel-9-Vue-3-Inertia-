<template>
   <h1 class="text-3xl mb-4">Your Listings</h1>
   <section>
      <RealtorFilters :filters="filters" />
   </section>
   <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
      <Box v-for="listing in listings.data" :class="{
         'border-dashed': listing.deleted_at
      }" :key="listing.id">
         <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
            <div :class="{
               'opacity-25': listing.deleted_at
            }">
               <div class="xl:flex items-center gap-2">
                  <Price class="text-2xl font-medium" :price="listing.price" />
                  <ListingSpace :listing="listing" />
               </div>

               <ListingAddress :listing="listing" class="text-gray-500" />
            </div>
            <section>
               <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                  <a class="btn-outline text-xs font-medium" target="_blank" :href="route('listing.show', { listing: listing.id })">Preview</a>
                  <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.edit', { listing: listing.id })">Edit</Link>
                  <Link v-if="!listing.deleted_at" class="btn-outline text-xs font-medium" :href="route('realtor.listing.destroy', {
                     listing: listing.id
                  })" as="button" method="delete">
                  Delete
                  </Link>
                  <Link v-else :href="restore('realtor.listing.restore', {
                     listing: listing.id
                  })" class="btn-outline text-xs font-medium" as="button" method="put">
                  Restore
                  </Link>
               </div>

               <div class="mt-2">
                  <Link class="block w-full btn-outline text-x font-medium text-center" :href="route('realtor.listing.image.create', {listing: listing.id})">Images</Link>
               </div>
            </section>
         </div>
      </Box>
   </section>

   <section v-if="listings.data.length" class="w-full flex justify-center my4">
      <Pagination :links="listings.inks" />
   </section>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue"
import Price from "@/Components/Price.vue"
import Box from "@/Components/UI/Box.vue"
import ListingSpace from "@/Components/UI/ListingSpace.vue"
import { Link } from "@inertiajs/vue3"
import RealtorFilters from "./Index/Components/RealtorFilters.vue"
import Pagination from "@/Components/UI/Pagination.vue"

defineProps({
   listings: Object,
   filters: Object
})

</script>