<template>
   <form @submit.prevent="create">
      <div class="grid grid-cols-6 gap-4">
         <div class="col-span-2">
            <label class="label">Beds</label>
            <input v-model.number="formData.beds" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.beds">
               {{ formData.errors.beds }}
            </div>
         </div>

         <div class="col-span-2">
            <label class="label">Baths</label>
            <input v-model.number="formData.baths" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.baths">
               {{ formData.errors.baths }}
            </div>
         </div>

         <div class="col-span-2">
            <label class="label">Area</label>
            <input v-model.number="formData.area" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.area">
               {{ formData.errors.area }}
            </div>
         </div>

         <div class="col-span-4">
            <label class="label">City</label>
            <input v-model="formData.city" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.city">
               {{ formData.errors.city }}
            </div>
         </div>

         <div class="col-span-2">
            <label class="label">Post Code</label>
            <input v-model="formData.code" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.code">
               {{ formData.errors.code }}
            </div>
         </div>

         <div class="col-span-4">
            <label class="label">Street</label>
            <input v-model="formData.street" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.street">
               {{ formData.errors.street }}
            </div>
         </div>

         <div class="col-span-2">
            <label class="label">Street Nr</label>
            <input v-model.number="formData.street_number" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.street_number">
               {{ formData.errors.street_number }}
            </div>
         </div>

         <div class="col-span-6">
            <label class="label">Price</label>
            <input v-model.number="formData.price" type="text" class="input" />
            <div class="input-error" v-if="formData.errors.price">
               {{ formData.errors.price }}
            </div>
         </div>

         <div class="col-span-6">
            <button type="submit" class="btn-primary">Create</button>
         </div>
      </div>
   </form>
</template>

<script setup>
import { useForm, router } from "@inertiajs/vue3"

defineProps({
   errors: Object
})
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

const create = () => router.post(route("realtor.listing.store"), formData)
</script>

<style scoped>
label {
   margin-right: 2em;
}

div {
   padding: 2px;
}
</style>