<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "momentum-trail";
</script>

<template>
  <div class="mt-4">
    <Link
      class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
      :href="route('register')"
    >
      Register
    </Link>
  </div>
</template>
