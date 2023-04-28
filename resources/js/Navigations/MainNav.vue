<script setup>
import GenericMenuItem from "@/Components/Nav/GenericMenuItem.vue";
import mainMenuItems from "@/menus/mainMenuItems";

const props = defineProps({
  vertical: {
    type: Boolean,
    default: false,
  },
});
</script>
<template>
  <nav aria-label="Site Nav">
    <ul
      :class="[
        'flex text-sm',
        props.vertical ? 'flex-col items-start gap-4' : 'items-center gap-6',
      ]"
    >
      <li v-for="item in mainMenuItems" :key="item.label">
        <GenericMenuItem :href="item.href">
          {{ item.label }}
        </GenericMenuItem>
      </li>
    </ul>
  </nav>
</template>
