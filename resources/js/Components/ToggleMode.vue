<script setup>
import { useDark } from "@vueuse/core";
import { Switch } from "@headlessui/vue";

const isDark = useDark();
</script>

<template>
  <Switch
    v-model="isDark"
    :class="isDark ? 'bg-teal-900' : 'bg-teal-700'"
    class="relative inline-flex h-[38px] w-[74px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out"
  >
    <span class="sr-only">Use setting</span>
    <span
      aria-hidden="true"
      :class="isDark ? 'translate-x-9' : 'translate-x-0'"
      class="pointer-events-none inline-block h-[34px] w-[34px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
    />
  </Switch>
</template>
