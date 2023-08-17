<script setup>
import Swal from "sweetalert2";
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, defineProps } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
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


</script>

<template>
  <div>
    <Navbar />
    <div>
      <div class="flex justify-center mt-5">
        <div class="overflow-hidden rounded-lg bg-white shadow">
          <div class="bg-gray-800 px-4 py-5 sm:p-6">
            <h2 class="text-center text-white my-4">Download {{ props.files.name }}</h2>
            <a :href="`/download/${props.files.slug}`" type="button"
              class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Download</a>

            <button type="button"
              class="mx-2 rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
              @click="deleteFile">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <Footer />
</template>

