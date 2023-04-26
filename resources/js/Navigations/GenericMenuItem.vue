<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  href: {
    type: String,
    required: true,
  },
  as: {
    type: String,
    default: "a",
  },
  method: {
    type: String,
    default: "get",
  },
});
</script>

<template>
  <Link
    :href="href"
    :as="as"
    :method="method"
    class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
  >
    <slot />
  </Link>
</template>
