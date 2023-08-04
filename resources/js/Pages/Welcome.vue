<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String
});
</script>

<template>
  <div>
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
          <div class="flex">
            <div class="-ml-2 mr-2 flex items-center md:hidden"></div>
            <div class="flex flex-shrink-0 items-center">
              <p class="text-white text-3xl">Fileshh</p>
            </div>
            <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a
                href="#"
                class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                aria-current="page"
              >Dashboard</a>
              <a
                href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
              >Team</a>
              <a
                href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
              >Projects</a>
              <a
                href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
              >Calendar</a>
            </div>
          </div>
          <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
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
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5 sm:px-6"></div>
        </div>
      </div>
    </nav>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-8xl mx-auto">

        <!---->
        <!---->
        <!---->
        <div class="relative pb-16 pt-4 overflow-hidden">
          <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg w-3/4 mx-auto mb-6">
              <h1
                class="my-2 text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10"
              >A Dead Simple File Upload System</h1>
              <p
                class="text-sm mb-8 text-center leading-6 text-indigo-600 tracking-wide uppercase"
              >Built for system administrators</p>
              <div class="w-full mx-auto mt-12">
                <div
                  class="w-full shadow-2xl subpixel-antialiased rounded rounded-t-lg h-auto bg-black border-black mx-auto"
                >
                  <div
                    class="flex items-center h-6 rounded-t bg-gray-100 border-b border-gray-500 text-center text-black"
                  >
                    <div
                      class="flex ml-2 items-center text-center border-red-900 bg-red-500 shadow-inner rounded-full w-3 h-3"
                    ></div>
                    <div
                      class="ml-2 border-yellow-900 bg-yellow-500 shadow-inner rounded-full w-3 h-3"
                    ></div>
                    <div
                      class="ml-2 border-green-900 bg-green-500 shadow-inner rounded-full w-3 h-3"
                    ></div>
                    <div class="mx-auto pr-16">
                      <p class="text-center text-sm">Filessh</p>
                    </div>
                  </div>
                  <div class="pl-1 pt-1 h-auto text-gray-200 font-mono text-base bg-black">
                    <p class="pb-1">Last login: Wed Sep 25 09:11:04 on ttys002</p>
                    <p>
                      <span class="text-green-400 font-black">➜</span>
                      <span class="text-teal-400 font-black">Desktop</span>
                      <span class="text-green-400"> Upload A File</span>
                    </p>
                    <p>
                      <span class="text-green-400 font-black">➜</span>
                      <span class="text-teal-400 font-black">Desktop</span> curl --upload-file ./your-file.txt https://Filessh.staging.codebihar.com/
                    </p>
                    <p>
                      <span class="text-green-400 font-black">➜</span>
                      <span class="text-teal-400 font-black">Desktop</span> https://Filessh.staging.codebihar.com//9ab64df49d/your-file.txt
                    </p>
                    <p class="mt-4">
                      <span class="text-green-400 font-black">➜</span>
                      <span class="text-teal-400 font-black">Desktop</span>
                      <span class="text-green-400"> Download A File</span>
                    </p>
                    <p>
                      <span class="text-green-400 font-black">➜</span>
                      <span class="text-teal-400 font-black">Desktop</span> curl -L https://Filessh.staging.codebihar.com//9ab64df49d/your-file.txt &gt; your-file.txt
                    </p>
                    <p class="mt-4">
                      <span class="text-green-400 font-black">➜</span>
                      <span class="text-teal-400 font-black">Desktop</span>
                      <span class="text-green-400"> Your Turn</span>
                    </p>
                    <p class="pb-4">
                      <span class="text-green-400 font-black">➜</span>
                      <span class="text-teal-400 font-black">Desktop</span> curl
                      <span class="blinking-cursor">_</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="prose prose-lg max-w-none text-gray-500 mx-auto">
              <h2>Getting Started</h2>
              <p>It's too easy to get started with Filessh -- all you need is a terminal window that supports curl and a file that you want to upload.</p>
              <p>A free bucket is provided by Filessh for public use. Files are limited to 500MB and are deleted 24 hours after upload</p>
              <h3>Ready? Let's Do This!</h3>
              <p>When you're ready to upload a file, just open your terminal window and type the following:</p>
              <code>curl --upload-file path/to/file.txt https://Filessh.staging.codebihar.com/</code>
              <p>When your file is done being uploaded, a link to your file will be in your terminal window.</p>
              <h3>Advanced Options</h3>
              <p>When you want a little bit more flexibility and control</p>
              <h4>Downloading with curl</h4>
              <p>Not only can you upload files to Filessh with curl, you can download too by adding the -L flag and declaring where to save the file</p>
              <code>curl -L https://Filessh.staging.codebihar.com//3d1fd43a21/filename.txt &gt; filename.txt</code>
              <h4>Rename file on upload</h4>
              <p>If you want to rename your file during upload, just give us the new name when you are calling https://Filessh.staging.codebihar.com//</p>
              <code>curl --upload-file path/to/file.gif https://Filessh.staging.codebihar.com//newname.gif</code>
              <h4>Uploading to a private bucket</h4>
              <p>Upload to your own private bucket by making an account and creating a bucket. Use your key as the authorization header.</p>
              <code>curl --upload-file path/to/file.gif https://your-bucket.Filessh -H "Authorization: your-key"</code>
              <h4>Set the max downloads</h4>
              <p>You can limit the maximum allowed downloads allowed for a single file.</p>
              <code>curl --upload-file path/to/file.gif https://your-bucket.Filessh -H "Max-Downloads: 10"</code>
              <h4>Auto destroy a file after the provided number of days</h4>
              <p>You can have a file automatically destroy itself after the provided number of days by setting the expires after header.</p>
              <code>curl --upload-file path/to/file.gif https://your-bucket.Filessh -H "Expires-After 10"</code>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- <Head title="Welcome" />
    <div class="flex justify-center">
      <h1>Filessh homepage will go here</h1>
    </div>
    <div
      class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >

    </div>-->
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
