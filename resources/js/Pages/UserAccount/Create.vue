<template>
   <form @submit.prevent="register">
      <div class="w-1/2 mx-auto">
         <div>
            <label for="email" class="label">Email</label>
            <input v-model="formData.email" type="text" id="email" class="input" />
            <div 
               class="input-error"
               v-if="formData.errors.email"
            >
               {{ formData.errors.email }}
            </div>
         </div>
         <div class="mt-4">
            <label for="name" class="label">Your Name</label>
            <input v-model="formData.name" type="text" id="name" class="input" />
            <div 
               class="input-error"
               v-if="formData.errors.name"
            >
               {{ formData.errors.name }}
            </div>
         </div>
         <div class="mt-4">
            <label for="password" class="label">Password</label>
            <input v-model="formData.password" type="password" id="password" class="input" />
            <div 
               class="input-error"
               v-if="formData.errors.password"
            >
               {{ formData.errors.password }}
            </div>
         </div>
         <div class="mt-4">
            <label for="password_confirmation" class="label">Confirm password</label>
            <input v-model="formData.password_confirmation" type="password" id="password_confirmation" class="input" />
            <!-- <div 
               class="input-error"
               v-if="formData.errors.password_confirmation"
            >
               {{ formData.errors.password_confirmation }}
            </div> -->
         </div>
         <div class="mt-4">
            <button class="btn-primary w-full" type="submit">Register</button>
         </div>
         <div class="mt-4">
            <div class="mt-2 text-center">
               <Link :href="route('login')" class="text-sm text-gray-500">ALready have an account? Click here</Link>
            </div>
         </div>
      </div>
   </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3"

const formData = useForm({
   name: null,
   email: null,
   password: null,
   password_confirmation: null
})

const register = () => formData.post(route("user-account.store"))
</script>