<script setup>
import Swal from "sweetalert2";
import { ref, defineProps } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
const props = defineProps({
  files: Array
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
  <AppLayout title="Dashboard">
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
  </AppLayout>
</template>

