<script setup>
import { ref, watchEffect } from "vue";

const props = defineProps({
  src: String,
});

const verifiedSrc = ref(null);
const ready = ref(false);

watchEffect(() => {
  const img = new Image();

  img.src = props.src;
  img
    .decode()
    .then(() => {
      verifiedSrc.value = props.src;
      ready.value = true;
    })
    .catch((e) => {
      verifiedSrc.value = null;
      ready.value = true;
    });
});
</script>

<template>
  <div v-if="ready" class="inline-flex h-full w-full">
    <img
      v-if="verifiedSrc"
      class="inline-block h-full w-full rounded-full object-cover object-center ring-0 ring-offset-2 ring-offset-slate-400 dark:ring-offset-sky-500"
      :src="verifiedSrc"
      alt="person-avatar"
    />
    <svg
      v-else
      fill="none"
      viewBox="0 0 128 128"
      stroke-width="2"
      stroke="currentColor"
      stroke-linecap="round"
      class="h-full w-full"
    >
      <circle cx="64" cy="40" r="28" />
      <path
        d="M12,112 Q12,80 40,66 M41,66 Q64,84 87,66 M116,112 Q116,80 88,66 M12,112 Q64,132 116,112"
      />
    </svg>
  </div>
</template>
