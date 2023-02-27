<script setup>
defineProps({
  href: {
    type: String,
    required: true,
  },
});
</script>
<template>
  <a
    class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
    :href="href"
  >
    <slot />
  </a>
</template>
