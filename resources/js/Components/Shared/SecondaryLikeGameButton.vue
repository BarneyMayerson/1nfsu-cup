<script setup>
defineProps({
  type: {
    type: String,
    default: "button",
  },
});
</script>

<template>
  <button
    :type="type"
    class="flex w-48 items-center justify-between rounded-sm bg-slate-600 py-2 px-3 font-semibold text-slate-200 shadow-sm hover:bg-slate-500 hover:text-slate-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-600"
  >
    <svg fill="none" viewBox="0 0 48 48" stroke="currentColor" class="h-8 w-8">
      <rect x="0" y="0" width="48" height="48" rx="9" stroke-width="6" />
      <polyline stroke-width="3" points="40,36 14,36" />
      <polyline stroke-width="3" points="18,32 12,36 18,40" />
    </svg>

    <span class="font-sans text-xl italic tracking-wide">
      <slot />
    </span>
  </button>
</template>
