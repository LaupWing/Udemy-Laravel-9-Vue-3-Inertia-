<template>
   <form @submit.prevent="create">
      <div>
         <div>
            <label>Beds</label>
            <input v-model.number="formData.beds" type="text" />
         </div>

         <div>
            <label>Baths</label>
            <input v-model.number="formData.baths" type="text" />
         </div>

         <div>
            <label>Area</label>
            <input v-model.number="formData.area" type="text" />
         </div>

         <div>
            <label>City</label>
            <input v-model="formData.city" type="text" />
         </div>

         <div>
            <label>Post Code</label>
            <input v-model="formData.code" type="text" />
         </div>

         <div>
            <label>Street</label>
            <input v-model="formData.street" type="text" />
         </div>

         <div>
            <label>Street Nr</label>
            <input v-model.number="formData.street_number" type="text" />
         </div>

         <div>
            <label>Price</label>
            <input v-model.number="formData.price" type="text" />
         </div>

         <div>
            <button type="submit">Create</button>
         </div>
      </div>
   </form>
</template>

<script setup>
import { useForm, router } from "@inertiajs/vue3"


const formData = useForm({
   beds: 0,
   baths: 0,
   area: 0,
   city: null,
   street: null,
   code: null,
   street_number: null,
   price: 0
})

const create = () => router.post("/listing", formData)
</script>

<style scoped>
label {
   margin-right: 2em;
}

div {
   padding: 2px;
}
</style>