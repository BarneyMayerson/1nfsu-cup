<script setup>
import { route } from "momentum-trail";
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <Link
    class="rounded-md bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white shadow dark:hover:bg-emerald-500"
    :href="route('login')"
    as="button"
  >
    Login
  </Link>

  <div class="hidden md:flex">
    <Link
      class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-emerald-600 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
      :href="route('register')"
      as="button"
    >
      Register
    </Link>
  </div>
</template>
