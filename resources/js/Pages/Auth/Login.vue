<template>
   <form @submit.prevent="login">
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
            <label for="password" class="label">Password</label>
            <input v-model="formData.password" type="password" id="password" class="input" />
            <div 
               class="input-error"
               v-if="formData.errors.password"
            >
               {{ formData.errors.password }}
            </div>
         </div>
         <button class="btn-primary w-full" type="submit">Login</button>
         <div class="mt-4">
            <div class="mt-2 text-center">
               <Link :href="route('user-account.create')" class="text-sm text-gray-500">Need an account? Click here</Link>
            </div>
         </div>
      </div>
   </form>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3"

const formData = useForm({
   email: null,
   password: null
})

const login = () => formData.post(route("login.store"))
</script>