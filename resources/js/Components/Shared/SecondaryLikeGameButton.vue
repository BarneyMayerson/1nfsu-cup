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
      <text
        fill="currentColor"
        x="10"
        y="38"
        stroke-linecap="round"
        style="font-size: 1rem; font-style: italic; letter-spacing: 0.1rem"
      >
        Esc
      </text>
    </svg>

    <span class="font-sans text-xl italic tracking-wide">
      <slot />
    </span>
  </button>
</template>
