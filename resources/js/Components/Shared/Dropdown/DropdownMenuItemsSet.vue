<script setup>
import { MenuItem } from "@headlessui/vue";
import DropdownMenuItem from "@/Components/Shared/Dropdown/DropdownMenuItem.vue";

const props = defineProps({
  items: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <MenuItem v-slot="{ active }" v-for="item in props.items" :key="item.title">
    <DropdownMenuItem
      :href="item.href"
      :active="active"
      :method="item.method"
      :as="item.as"
    >
      {{ item.title }}
    </DropdownMenuItem>
  </MenuItem>
</template>
