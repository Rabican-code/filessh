<script setup>
import Swal from "sweetalert2";
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, defineProps } from "vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
  files: Array,
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String
});

console.log(props.files);
const deleteFile = () => {
  const confirmed = confirm("Are you sure you want to delete this file?");
  if (confirmed) {
    axios
      .delete(`/delete/${props.files.id}`)
      .then(() => {
        console.log("File deleted successfully");
        Swal.fire({
          icon: "success",
          title: "File Deleted",
          text: "The file has been successfully deleted."
        });
        window.location.href = "/welcome";
      })

      .catch(error => {
        console.log(error);
      });
  }
};

const downloadFile = () => {
  window.location.href = `/download/${props.files.slug}`;
};
</script>

<template>
  <div>
    <div v-if="canLogin" class="my-4 sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
      <Link
        v-if="$page.props.auth.user"
        :href="route('dashboard')"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
      >Dashboard</Link>

      <template v-else>
        <Link
          :href="route('login')"
          class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Log in</Link>

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Register</Link>
      </template>
    </div>
    <div>
      <div class="flex justify-center mt-5">
        <div class="overflow-hidden rounded-lg bg-white shadow">
          <div class="px-4 py-5 sm:p-6">
            <h2 class="text-center my-4">Download {{ props.files.name }}</h2>
            <button
              type="button"
              @click="downloadFile"
              class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >Download</button>

            <button
              type="button"
              class="mx-2 rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
              @click="deleteFile"
            >Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

