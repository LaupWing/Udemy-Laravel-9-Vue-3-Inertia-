<template>
   <Link href="/hello">Show page</Link>
   <Link href="/">Index page</Link>
   <slot>Default</slot>
</template>

<script setup>
import {Link} from "@inertiajs/vue3"
import { ref } from "vue"

</script>