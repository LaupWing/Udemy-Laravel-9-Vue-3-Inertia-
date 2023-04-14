<template>
   <Box>
      <template #header>
         <span v-if="offer.accepted_at" class="dark:bg-green-900 dark:text-green-200 text-green-900 rounded p-1 uppercase bg-green-200 ml-1">accepted</span>
         Offer #{{ offer.id }}
      </template>

      <section class="flex items-center justify-between">
         <div>
            <Price 
               :price="offer.amount"
               class="text-xl"
            />
            <div class="text-gray-500">
               Difference <Price :price="difference" />
            </div>

            <div class="text-gray-500 text-sm">
               Made by  {{ offer.bidder }}
            </div>

            <div class="text-gray-500 text-sm">
               Made by {{ madeOn }}
            </div>
         </div>
         <div>
            <Link 
               v-if="sold"
               class="btn-outline text-xs font-medium" 
               :href="route('realtor.offer.accept', { offer: offer.id })"
               as="button"
               method="put"
            >
               Accept
            </Link>
         </div>
      </section>
   </Box>
</template>

<script setup>
import Price from "@/Components/Price.vue"
import Box from "@/Components/UI/Box.vue"
import { Link } from "@inertiajs/vue3"
import { computed } from "vue"

const props = defineProps({
   listing: Object,
   offer: Object,
   listingPrice: number
})

const sold = computed(() => !props.offer.accepted_at && !props.offer.rejected_at)
const difference = computed(() => props.offer.amount - props.listingPrice)

const madeOn = computed(() => new Date(props.offer.createdAt).toDateString())
</script>