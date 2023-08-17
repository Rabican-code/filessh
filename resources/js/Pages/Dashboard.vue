<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import { ref, defineProps } from "vue";
const props = defineProps({
  token: Array,
  user: Array
});


</script>

<template>
  <div >
    <Navbar/>
    <div class="bg-gray-900">
      <div class="relative isolate pt-14">
        <div class="py-24 sm:py-32 lg:pb-40">
          <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
              <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">A Simple file Transfer system
              </h1>
              <p class="mt-6 text-lg leading-8 text-gray-300">Filessh helps you transfer files quickly in terminal</p>

              <!-- <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#"
                  class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">Get
                  started</a>
                <a href="#" class="text-sm font-semibold leading-6 text-white">Learn more <span
                    aria-hidden="true">→</span></a>
              </div> -->
            </div>

          </div>
        </div>
        <div
          class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
          aria-hidden="true">
          <div
            class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
          </div>
        </div>
      </div>
    </div>

    <div id="docs" style="scroll-behavior: smooth ;"  class="scroll-behavior: smooth bg-gray-900 py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
          <h2 class="text-base font-semibold leading-7 text-indigo-400">Everything you need</h2>
        </div>
        <dl
          class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 text-base leading-7 text-gray-300 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:gap-x-16">
          <div class="relative pl-9">
            <dt class="inline font-semibold text-white">
              <i class="fa-solid fa-cloud-arrow-up"></i>
              Upload A File.
            </dt>
            <div>curl --upload-file path/to/file.txt https://Filessh.staging.codebihar.com/</div>

            <dd class="inline"></dd>
          </div>

          <div class="relative pl-9">
            <dt class="inline font-semibold text-white">
              Download A File.
            </dt><br>
            <dd class="inline">curl -L https://Filessh.staging.codebihar.com/3d1fd43a21/filename.txt > filename.txt
            </dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-white">
              Max Downloads.
            </dt> <br>
            <dd class="inline">curl --upload-file path/to/file.gif https://Filessh.staging.codebihar.com/ -H
              "Max-Downloads: 10"
            </dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-white">
              Rename A File.
            </dt><br>
            <dd class="inline">curl --upload-file path/to/file.gif https://Filessh.staging.codebihar.com/new-name</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-white">
              Delete A File After Some Time.
            </dt><br>
            <dd class="inline">curl --upload-file path/to/file.gif https://Filessh.staging.codebihar.com/ -H
              "Expires-After 10"</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-white">
              Upload to A Personal Bucket.
            </dt><br>
            <dd class="inline">curl --upload-file path/to/file.gif https://Filessh.staging.codebihar.com/ -H
              "Authorization: bearer your-token"
            </dd>
          </div>
        </dl>
      </div>

      <div class="my-12 text-white flex justify-center">
        <div class="bg-gray-700 rounded-lg w-max p-2">
          <div class="flex justify-between">
            <div class=" pl-2 text-md"> Hey {{ props.user.name }}, This is your Token :</div>

          </div>
          <div class="bg-gray-800 rounded-lg w-[40rem] pl-3 py-2 "> {{ props.token }}</div>
        </div>
      </div>
    </div>
    <Footer/>
  </div>
</template>
<script>
export default {
  data() {
    return {
      ref: null
    };
  },
};
</script>