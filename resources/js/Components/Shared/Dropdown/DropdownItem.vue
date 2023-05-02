<script setup>
import { MenuItem } from "@headlessui/vue";

const props = defineProps({
  as: {
    type: [String, Object],
    default: "a",
  },
  description: String,
});
</script>

<template>
  <MenuItem v-slot="{ active, close }">
    <component
      :is="props.as"
      @click="close"
      :class="[
        active
          ? '-ml-px border-l border-l-gray-900 text-gray-900 dark:border-l-gray-100 dark:text-gray-100'
          : 'text-gray-500 dark:text-gray-300',
        'group flex w-full flex-col px-2 py-2 text-left text-sm',
      ]"
    >
      <span><slot /></span>
      <span
        v-if="props.description"
        class="mt-0.5 text-xs text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-100"
      >
        {{ props.description }}
      </span>
    </component>
  </MenuItem>
</template>
