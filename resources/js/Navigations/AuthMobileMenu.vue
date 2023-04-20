<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import Avatar from "@/Components/User/Avatar.vue";
import BellIcon from "@/Components/Shared/Icons/BellIcon.vue";

const currentUser = computed(() => usePage().props.auth.user);
</script>

<template>
  <div class="mt-4 flex items-center">
    <div class="h-10 w-10 flex-shrink-0">
      <Avatar :src="currentUser.avatar" />
    </div>
    <div class="ml-4">
      <div class="text-base font-medium">Tom Cook</div>
      <div class="text-sm font-medium">tom@example.com</div>
    </div>
    <button
      type="button"
      class="ml-auto flex-shrink-0 rounded-full p-1 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-200"
    >
      <span class="sr-only">View notifications</span>
      <BellIcon class="h-8 w-8" aria-hidden="true" />
    </button>
  </div>
  <div class="mt-3 flex flex-col items-start space-y-1">
    <Link
      class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
      href="#"
    >
      Your Profile
    </Link>
    <Link
      class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
      href="#"
    >
      Settings
    </Link>
    <Link
      class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
      :href="route('logout')"
      method="post"
      as="button"
    >
      Logout
    </Link>
  </div>
</template>
