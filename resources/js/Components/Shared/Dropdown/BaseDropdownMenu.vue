<script setup>
import { computed } from "vue";
import { Menu, MenuButton, MenuItems } from "@headlessui/vue";
import DropdownMenuItemsSet from "@/Components/Shared/Dropdown/DropdownMenuItemsSet.vue";

const props = defineProps({
  items: {
    type: Array,
    required: true,
  },
  hideChevron: {
    type: Boolean,
    default: false,
  },
});

const hasGroupes = computed(() => Boolean(Array.isArray(props.items[0])));
</script>

<template>
  <!-- <div class="w-56 text-right"> -->
  <Menu as="div" class="relative inline-block text-left">
    <!-- <div> -->
    <MenuButton
      class="inline-flex w-full items-center justify-center rounded-md bg-transparent px-1 text-sm font-medium"
    >
      <slot name="menuButtonTitle" />
      <svg
        v-if="!props.hideChevron"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="ml-2 -mr-1 h-5 w-5 text-gray-700 transition hover:opacity-75 dark:text-gray-200"
        aria-hidden="true"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M19.5 8.25l-7.5 7.5-7.5-7.5"
        />
      </svg>
    </MenuButton>
    <!-- </div> -->

    <transition
      enter-active-class="transition duration-100 ease-out"
      enter-from-class="transform scale-95 opacity-0"
      enter-to-class="transform scale-100 opacity-100"
      leave-active-class="transition duration-75 ease-in"
      leave-from-class="transform scale-100 opacity-100"
      leave-to-class="transform scale-95 opacity-0"
    >
      <MenuItems
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md py-1 ring-2 ring-gray-300 focus:outline-none dark:ring-gray-600"
      >
        <div
          v-if="hasGroupes"
          class="divide-y divide-gray-300 dark:divide-gray-600"
        >
          <div v-for="group in props.items" :key="props.items.indexOf(group)">
            <DropdownMenuItemsSet :items="group" />
          </div>
        </div>

        <div v-else>
          <DropdownMenuItemsSet :items="props.items" />
        </div>
      </MenuItems>
    </transition>
  </Menu>
  <!-- </div> -->
</template>
