<template>
   <Box>
      <template #header>Make on Offer</template>
      <div>
         <form>
            <input 
               type="text" 
               class="input"
               v-model.number="formData.amount"
            >
            <input 
               type="range" 
               :min="min" 
               :max="max" 
               step="10000" 
               class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
               v-model.number="formData.amount"
            >

            <button type="submit" class="bt-outline w-full mt-2 text-sm">
               Make an offer
            </button>
         </form>
         <div class="flex justify-between text-gray-500 mt-2">
            <div>Diffrence</div>
            <div>
               <Price 
                  :price="difference"
               />
            </div>
         </div>
      </div>
   </Box>
</template>

<script setup>
import Price from "@/Components/Price.vue"
import Box from "@/Components/UI/Box.vue"
import { useForm } from "@inertiajs/vue3"
import { computed } from "vue"

const props = defineProps({
   listingId: Number,
   price: Number
})

const formData = useForm({
   amount: props.price
})

const difference = computed(() => { 
   return formData.amount - props.price
})

const min = computed(() => props.price / 2)
const max = computed(() => props.price * 2)
</script>