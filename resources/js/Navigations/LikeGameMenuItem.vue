<script setup>
import { computed, ref } from "vue";

const hovered = ref(false);

const containerClasses = computed(() => {
  return hovered.value
    ? "relative h-16  w-80 border-b-[12px] border-t-[12px]"
    : "relative h-16  w-80 py-[12px]";
});
</script>

<template>
  <div :class="containerClasses">
    <div
      v-if="hovered"
      class="absolute -left-[6px] -top-[12px] h-[12px] w-[12px] skew-x-[45deg] bg-white dark:bg-sky-900"
    ></div>
    <div
      v-if="hovered"
      class="absolute -left-[6px] -bottom-[12px] h-[12px] w-[12px] -skew-x-[45deg] bg-white dark:bg-sky-900"
    ></div>
    <div
      v-if="hovered"
      class="animate-blinking absolute -right-[21px] -top-[2px] -my-2.5 h-[64px] w-5 bg-neutral-500"
    ></div>
    <button
      type="button"
      @focusin="hovered = true"
      @focusout="hovered = false"
      @mouseover="hovered = true"
      @mouseleave="hovered = false"
      class="flex w-full justify-end pr-2 font-sans text-3xl font-medium uppercase italic tracking-wide text-sky-600 hover:text-stone-900 focus:text-stone-900 focus:outline-none dark:text-sky-400 dark:hover:text-stone-200 dark:focus:text-stone-200"
    >
      <slot></slot>
    </button>
  </div>
</template>

<style scoped>
.animate-blinking {
  -webkit-animation: animate-blinking 0.7s ease-in infinite;
  animation: animate-blinking 0.7s ease-in infinite;
}

@-webkit-keyframes animate-blinking {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.25;
  }
  100% {
    opacity: 1;
  }
}
@keyframes animate-blinking {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.25;
  }
  100% {
    opacity: 1;
  }
}
</style>
