<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  href: {
    type: String,
    required: true,
  },
  method: {
    type: String,
    default: "get",
  },
  isCurrent: {
    type: Boolean,
    default: false,
  },
  active: {
    type: Boolean,
    default: false,
  },
  as: {
    type: String,
    default: "a",
  },
});
</script>

<template>
  <Link
    :href="href"
    :method="method"
    :as="as"
    :class="[
      'block px-4 py-2 text-sm',
      active
        ? '-ml-px border-l border-l-gray-900 text-gray-900 dark:border-l-gray-100 dark:text-gray-100'
        : 'text-gray-500 dark:text-gray-300',
      isCurrent ? 'font-semibold text-gray-900 dark:text-gray-100' : '',
    ]"
  >
    <slot />
  </Link>
</template>
