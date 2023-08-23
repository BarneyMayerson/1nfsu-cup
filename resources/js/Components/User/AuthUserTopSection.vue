<script setup>
import { Link } from "@inertiajs/vue3";
import Avatar from "@/Components/User/Avatar.vue";
import { route } from "momentum-trail";

defineProps({
  user: Object,
});
</script>

<template>
  <div class="flex items-center justify-between">
    <div class="flex items-center space-x-2">
      <span class="h-16 w-16">
        <Avatar :src="user.avatar" />
      </span>
      <div>
        <h2 class="text-2xl font-semibold">
          <Link :href="route('public-profile', user.mergedName)">
            {{ user.name }} ({{ user.mergedName }})
          </Link>
        </h2>
        <p>Your personal account</p>
      </div>
    </div>
    <Link
      :href="route('public-profile', user.mergedName)"
      class="rounded-lg border border-indigo-700 px-5 py-2.5 text-center text-base font-medium uppercase italic tracking-widest text-indigo-700 hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:border-sky-500 dark:text-sky-500 dark:hover:bg-sky-600 dark:hover:text-white dark:focus:ring-sky-800"
    >
      Go to your personal profile
    </Link>
  </div>
</template>
