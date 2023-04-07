<template>
   <form @submit.prevent="filter">
      <div class="mb-8 mt-4 flex flex-wrap gap-2">
         <div class="flex flex-nowrap items-center">
            <input   
               class="input-filter-l w-28" 
               type="text" 
               placeholder="Price from"
               v-model.number="filterFormData.priceFrom"
               />
            <input 
               class="input-filter-r w-28" 
               type="text" 
               placeholder="Price to"
               v-model.number="filterFormData.priceTo"
            />
         </div>

         <div class="flex flex-nowrap items-center">
            <select 
               class="input-filter-l w-28"
               v-model="filterFormData.beds"
            >
               <option :value="null">Beds</option>
               <option 
                  v-for="n in 5"
                  :key="n"
                  :value="n"
               >
                  {{ n }}
               </option>
               <option>6+</option>
            </select>
            <select 
               class="input-filter-r w-28"
               v-model="filterFormData.baths"
            >
               <option :value="null">Baths</option>
               <option 
                  v-for="n in 5"
                  :key="n"
                  :value="n"
               >
                  {{ n }}
               </option>
               <option>6+</option>
            </select>
         </div>

         <div class="flex flex-nowrap items-center">
            <input 
               class="input-filter-l w-28" 
               type="text" 
               placeholder="Area from"
               v-model.number="filterFormData.areaFrom"
            />
            <input 
               class="input-filter-r w-28" 
               type="text" 
               placeholder="Area to"
               v-model.number="filterFormData.areaTo"
            />
         </div>

         <button class="btn-normal" type="submit">Filter</button>
         <button @click="clear" type="reset">Clear</button>
      </div>
   </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3"

const props = defineProps({
   filters: Object
})

const filterFormData = useForm({
   priceFrom: props.filters.priceFrom ?? null,
   priceTo: props.filters.priceTo ?? null,
   beds: props.filters.beds ?? null,
   baths: props.filters.baths ?? null,
   areaFrom: props.filters.areaFrom ?? null,
   areaTo: props.filters.areaTo ?? null,
})

const filter = () => {
   filterFormData.get(
      route("listing.index"),
      {
         preserveState: true,
         preserveScroll: true
      }
   )
}

const clear = () => {
   filterFormData.priceFrom =  null
   filterFormData.priceTo =  null
   filterFormData.beds =  null
   filterFormData.baths =  null
   filterFormData.areaFrom =  null
   filterFormData.areaTo =  null
   filter()
}
</script>