<template>
   <MainLayout>
      Index
      <div>
         The  message is {{ message }}
      </div>
   </MainLayout>
</template>

<script setup>
import {Link} from "@inertiajs/vue3"
import MainLayout from "../../Layouts/MainLayout.vue"

const props = defineProps(["message"])
console.log(props)

</script>