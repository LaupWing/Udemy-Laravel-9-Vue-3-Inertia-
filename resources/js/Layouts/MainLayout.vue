<template>
   <Link href="/listing">Listings</Link>
   <Link href="/listing/create">Create new listing</Link>
   <div v-if="flashMessage" class="success">
      {{ flashMessage }}
   </div>
   <slot>Default</slot>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ref } from "vue"


const flashMessage = computed(() => usePage().props.flash?.success)

</script>

<style scoped>
.success {
   background-color: green;
   color: white;
}
</style>