
<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
</script>
<template>
  <nav class="bg-gray-900">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 ">
        <div class="flex">
          <div class="-ml-2 mr-2 flex items-center md:hidden"></div>
          <div class="flex flex-shrink-0 items-center">
            <a class="text-white text-3xl" href="/dashboard">Filessh</a>
          </div>
          <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
            <a href="/dashboard"
              class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>

            <a href="/dashboard#docs" style="scroll-behavior: smooth ;"
              class="scroll-behavior: smooth text-gray-300  hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Docs</a>


          </div>
        </div>
        <div class="mt-4">
          <Dropdown align="right" width="48">
            <template #trigger>
              <button v-if="$page.props.jetstream.managesProfilePhotos"
                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url"
                  :alt="$page.props.auth.user.name">
              </button>

              <span v-else class="inline-flex rounded-md">
                <button type="button"
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-700 focus:outline-none focus:bg-gray-600 active:bg-gray-600 transition ease-in-out duration-150">
                  {{ $page.props.auth.user.name }}

                  <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                  </svg>
                </button>
              </span>
            </template>

            <template #content>
              <!-- Account Management -->
              <div class="block px-4 py-2 text-xs text-white">
                Manage Account
              </div>

              <DropdownLink :href="route('profile.show')">
                Profile
              </DropdownLink>

              <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                API Tokens
              </DropdownLink>

              <div class="border-t border-gray-200" />

              <!-- Authentication -->
              <form method="POST" action="logout">
                <DropdownLink as="button">
                  Log Out
                </DropdownLink>
              </form>
            </template>
          </Dropdown>
        </div>
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
          <Link v-if="$page.props.auth.user" :href="route('dashboard')"
            class="font-semibold text-gray-300 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
          Dashboard</Link>

          <template v-else>
            <Link :href="route('login')"
              class="font-semibold text-gray-300 hover:text-gray-900 dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Log in</Link>

            <Link v-if="canRegister" :href="route('register')"
              class="ml-4 font-semibold text-gray-300 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
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
</template>
<script>

export default {
  methods: {

  }
}

</script>

