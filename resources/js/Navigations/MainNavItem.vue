<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
  href: {
    type: String,
    required: true,
  },
});
</script>
<template>
  <Link
    class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
    :href="href"
  >
    <slot />
  </Link>
</template>
