<template>
   <Box>
      <div>
         <Link :href="route('listing.show', listing.id)">
            <div class="flex items-center">
               <Price :price="listing.price" class="text-2xl font-bold"/>
               <div class="text-xs text-gray-500">
                  <Price :price="monthlyPayment" /> pm
               </div>
            </div>
            <ListingSpace :listing="listing" />
            <ListingAddress :listing="listing" class="text-gray-500" />
         </Link>
      </div>
   </Box>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue"
import ListingAddress from "@/Components/ListingAddress.vue"
import Price from "@/Components/Price.vue"
import ListingSpace from "@/Components/UI/ListingSpace.vue"
import { Link } from "@inertiajs/vue3"
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment"
const props = defineProps({
   listing: Object
})
const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25)
</script>