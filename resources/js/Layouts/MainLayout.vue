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
            <div>
               <Link class="btn-primary" :href="route('listing.create')">Create</Link>
            </div>
         </nav>
      </div>
   </header>
   <main class="container p-4 mx-auto">
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

</script>