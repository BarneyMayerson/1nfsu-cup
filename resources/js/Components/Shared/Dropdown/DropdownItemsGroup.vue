<script setup>
const props = defineProps({
  label: String,
});
</script>

<template>
  <div :class="['px-0', props.label ? 'pb-1 pt-5' : 'py-1']">
    <div
      v-if="props.label"
      class="mb-1.5 px-2 text-[11px] font-bold uppercase tracking-tight"
    >
      {{ props.label }}
    </div>

    <slot />
  </div>
</template>
