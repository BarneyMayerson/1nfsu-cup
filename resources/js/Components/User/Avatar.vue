<script setup>
import { computed } from "vue";

const props = defineProps({
  imageUrl: {
    type: [String, Boolean],
    default: false,
  },
});

const hasImage = computed(() => Boolean(props.imageUrl));
</script>

<template>
  <div class="inline-flex">
    <img
      v-if="hasImage"
      class="dark:ring-offset-scy-500 inline-block rounded-full object-cover object-center ring-0 ring-offset-4 ring-offset-slate-400 dark:ring-offset-sky-500"
      :src="imageUrl"
      alt="person-avatar"
    />
    <svg
      v-else
      fill="none"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
      class="h-full w-full"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
      />
    </svg>
  </div>
</template>
