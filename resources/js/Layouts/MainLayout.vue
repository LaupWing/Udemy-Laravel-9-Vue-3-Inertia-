<template>
   <header class="border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 bg-white w-full">
      <div class="container mx-auto">
         <nav class="p-4 flex items-center justify-between">
            <div class="text-lg font-medium">
               <Link :href="route('listing.index')">Listings</Link>
            </div>
            <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
               <Link :href="route('listing.index')">LaraZillow</Link>
            </div>
            <div v-if="user" class="flex items-center gap-4">
               <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')">{{ user.name }}</Link>
               <Link class="bg-primary" :href="route('listing.create')">Create</Link>
               <div>
                  <Link :href="route('logout')" method="DELETE" as="button">Logout</Link>
               </div>
            </div>
            <div class="flex items-center gap-2" v-else>
               <Link :href="route('user-account.create')">Register</Link>
               <Link :href="route('login')">Sign-In</Link>
            </div>
         </nav>
      </div>
   </header>
   <main class="container p-4 mx-auto w-full">
      <div v-if="flashMessage" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
         {{ flashMessage }}
      </div>
      <slot>Default</slot>
   </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ref } from "vue"

const flashMessage = computed(() => usePage().props.flash?.success)
const user = computed(() => usePage().props.user)

</script>