<script setup>
defineProps({
  type: {
    type: String,
    default: "submit",
  },
});
</script>

<template>
  <button
    :type="type"
    class="flex w-48 items-center justify-between rounded-sm bg-sky-600 py-2 px-3 font-semibold text-sky-200 shadow-sm hover:bg-sky-500 hover:text-sky-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600"
  >
    <svg fill="none" viewBox="0 0 48 48" stroke="currentColor" class="h-8 w-8">
      <rect x="0" y="0" width="48" height="48" rx="9" stroke-width="6" />
      <polyline stroke-width="3" points="40,24 40,36 16,36" />
      <polyline stroke-width="3" points="20,32 14,36 20,40" />
    </svg>

    <span class="font-sans text-xl italic tracking-wide">
      <slot />
    </span>
  </button>
</template>
