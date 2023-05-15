<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  item: Object,
});
</script>

<template>
  <Link
    :style="
      item.depth
        ? `margin-left: -${item.depth}rem; padding-left: ${item.depth}rem`
        : ''
    "
    :href="item.href"
    :class="[
      item.current
        ? 'border-s-4 border-cyan-500 bg-gray-100 text-slate-900 dark:bg-slate-500 dark:text-slate-200'
        : 'border-transparent text-slate-500 dark:text-white',
      'group flex gap-x-2 border-s-4 py-2 pl-1 leading-6 hover:border-cyan-500 hover:bg-slate-100  hover:text-slate-900 hover:dark:bg-slate-500 hover:dark:text-slate-200',
    ]"
  >
    <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
    {{ item.label }}
  </Link>
  <div v-if="item.children.length" class="ml-4 mt-1">
    <li v-for="child in item.children" :key="child.label">
      <VerticalNavItem :item="child" />
    </li>
  </div>
</template>
