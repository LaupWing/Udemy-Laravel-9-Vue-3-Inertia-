<template>
   <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">
      <Box class="md:col-span-7 flex items-center w-full">
         <div class="w-full text-center font-medium text-gray-500">No images</div>
      </Box>
      <div class="md:col-span-5 flex flex-col gap-4">
         <Box class="">
            <template #header>
               Basic Info
            </template>
            <Price :price="listing.price" class="text-2xl font-bold" />
            <ListingSpace :listing="listing" />
            <ListingAddress :listing="listing" class="text-gray-500" />
         </Box>
         <Box>
            <template #header>
               Monthly payment
            </template>
            <div>
               <label class="label">Interest rate ({{ interestRate }}%)</label>
               <input type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" v-model.number="interestRate">
               <label class="label">Duration ({{ duration }} years)</label>
               <input type="range" min="3" max="35" step="1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" v-model.number="duration">
               <div class="text-gray-600 dark:text-gray-300 mt-2">
                  <div class="text-gray-400">Your monthly payment</div>
                  <Price :price="monthlyPayment" class="text-3xl" />
               </div>
            </div>
         </Box>
      </div>
   </div>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue"
import Price from "@/Components/Price.vue"
import Price from "@/Components/Price.vue"
import Box from "@/Components/UI/Box.vue"
import ListingSpace from "@/Components/UI/ListingSpace.vue"
import { computed, ref } from "vue"

const props = defineProps({
   listing: Object
})

const interestRate = ref(2.5)
const duration = ref(25)

const monthlyPayment = computed(() => {
   const principle = props.listing.price
   const monthlyInterest = interestRate.value / 100 / 12
   const numberOfPaymentMonths = duration.value * 12
   return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
})
</script>