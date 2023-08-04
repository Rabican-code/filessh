<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import { ref, defineProps } from "vue";
const props = defineProps({
  token: Array
});
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="m-4 p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <h2>Token:{{ props.token}}</h2>

        </div>
      </div>
    </div>
  </AppLayout>
</template>
