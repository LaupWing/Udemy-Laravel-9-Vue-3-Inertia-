<template>
   <div>
      Index
      <Link href="/hello">Show page</Link>
      <div>
         The  message is {{ message }}
      </div>
   </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3"
const props = defineProps(["message"])
console.log(props)

</script>