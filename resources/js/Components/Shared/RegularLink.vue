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
    data-test="regular-link"
    :href="href"
    :as="as"
    :method="method"
    class="text-gray-700 transition hover:underline hover:opacity-75 dark:text-gray-200"
  >
    <slot />
  </Link>
</template>
