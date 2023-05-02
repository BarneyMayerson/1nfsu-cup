<script setup>
import { Menu, MenuButton, MenuItems } from "@headlessui/vue";

const props = defineProps({
  align: {
    type: String,
    validator: (value) => ["left", "right"].includes(value),
    default: "right",
  },
  width: {
    type: String,
    default: "12rem",
  },
});
</script>

<template>
  <div class="w-56 text-right">
    <Menu as="div" class="relative inline-block text-left">
      <div>
        <MenuButton as="template">
          <slot />
        </MenuButton>
      </div>

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          :style="{
            width: props.width,
          }"
          :class="{
            'right-0 origin-top-right': props.align === 'right',
            'left-0 origin-top-left': props.align === 'left',
          }"
          class="absolute z-10 mt-2 divide-y divide-gray-300 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:divide-gray-600 dark:bg-sky-950"
        >
          <slot name="items" />
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>
