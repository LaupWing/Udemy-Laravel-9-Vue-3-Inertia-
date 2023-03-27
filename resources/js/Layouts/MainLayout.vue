<template>
   <Link href="/hello">Show page</Link>
   <Link href="/">Index page</Link>
   <slot></slot>
</template>

<script setup>
import {Link} from "@inertiajs/vue3"
import { ref } from "vue"

const timer = ref(0)

</script>