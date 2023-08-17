<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String
});

</script>

<template>
  <div>
    <nav class="bg-gray-900">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 ">
          <div class="flex">
            <div class="-ml-2 mr-2 flex items-center md:hidden"></div>
            <div class="flex flex-shrink-0 items-center">
              <a class="text-white text-3xl" href="/dashboard">Filessh</a>
            </div>
            <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/dashboard"
                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>

              <a href="/#docs" 
                class="text-gray-300  hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Docs</a>
            </div>
          </div>
          <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
              class="font-semibold text-gray-300 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
              <Link :href="route('login')"
                class="font-semibold text-gray-300 hover:text-gray-200 dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
              Log in</Link>

              <Link v-if="canRegister" :href="route('register')"
                class="ml-4 font-semibold text-gray-300 hover:text-gray-200 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
              Register</Link>
            </template>

          </div>
        </div>
      </div>
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5 sm:px-6"></div>
        </div>
      </div>
    </nav>
    <div  class="bg-gray-900">
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

    <div id="docs" class="bg-gray-900 py-24 sm:py-32">
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
              Download File.
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

              Rename File.
            </dt><br>
            <dd class="inline">curl --upload-file path/to/file.gif https://Filessh.staging.codebihar.com/</dd>
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
              Create A Personal Bucket.
            </dt><br>
            <dd class="inline">curl --upload-file path/to/file.gif https://Filessh.staging.codebihar.com/ -H
              "Authorization: your-key"
            </dd>
          </div>
        </dl>
      </div>
    </div>
   <Footer/>
  </div>
</template>

<style>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}
</style>

<script>
export default {
  data() {
    return {
      ref: null
    };
  },
  methods: {
  
  }
};
</script>