<script setup>
import { computed } from "vue";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import DropdownMenuItem from "@/Navigations/DropdownMenuItem.vue";

const props = defineProps({
  hideChevron: {
    type: Boolean,
    default: false,
  },
});

const menuItems = [
  [
    { title: "edit", href: "#" },
    { title: "duplicate", href: "#" },
    { title: "archive", href: "#" },
  ],
  [
    { title: "move", href: "#" },
    { title: "delete", href: "#" },
  ],
];

const hasMenuItems = computed(() => Boolean(menuItems.length));

const hasGroupes = computed(() =>
  hasMenuItems.value ? Array.isArray(menuItems[0]) : false
);
</script>

<template>
  <div class="w-56 text-right">
    <Menu as="div" class="relative inline-block text-left">
      <div>
        <MenuButton
          class="inline-flex w-full justify-center rounded-md bg-black bg-opacity-20 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
        >
          <slot name="menuButtonTitle" />
          <svg
            v-if="!props.hideChevron"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="ml-2 -mr-1 h-5 w-5 text-violet-200 hover:text-violet-100"
            aria-hidden="true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 8.25l-7.5 7.5-7.5-7.5"
            />
          </svg>
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
          v-if="hasMenuItems"
          :class="[
            hasGroupes ? 'divide-y divide-gray-200 dark:divide-gray-400' : '',
            'absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 ring-gray-200 focus:outline-none dark:bg-sky-700 dark:ring-gray-800',
          ]"
        >
          <div
            v-if="hasGroupes"
            class="p-1"
            v-for="group in menuItems"
            :key="menuItems.indexOf(group)"
          >
            <MenuItem
              v-slot="{ active }"
              v-for="item in group"
              :key="item.title"
            >
              <DropdownMenuItem :href="item.href" :active="active">
                {{ item.title }}
              </DropdownMenuItem>
            </MenuItem>
          </div>

          <MenuItem
            v-else
            v-slot="{ active }"
            v-for="item in menuItems"
            :key="item.title"
          >
            <DropdownMenuItem :href="item.href" :active="active">
              {{ item.title }}
            </DropdownMenuItem>
          </MenuItem>
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>
