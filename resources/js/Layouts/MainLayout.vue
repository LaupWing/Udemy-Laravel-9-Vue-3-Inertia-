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
               <div class="text-gray-500 relative pr-2 py-2 text-lg">
                  🔔
                  <div class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                  {{ notificationCount }}
                  </div>
               </div>
               <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')">{{ user.name }}</Link>
               <Link class="bg-primary" :href="route('realtor.listing.create')">Create</Link>
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
import { computed } from "vue"

const flashMessage = computed(() => usePage().props.flash?.success)
const user = computed(() => usePage().props.user)
const notificationCount = computed(() => Math.min(usePage().props.notificationCount, 9))

</script>