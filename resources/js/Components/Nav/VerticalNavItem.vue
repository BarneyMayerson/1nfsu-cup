<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import ChevronDownIcon from "@/Components/Shared/Icons/ChevronDownIcon.vue";

const props = defineProps({
  item: Object,
});

const hasActiveChild = computed(() =>
  props.item.children.some((item) => item.current)
);
</script>

<template>
  <Link
    v-if="!item.children.length"
    :href="item.href"
    :class="[
      item.current
        ? 'border-s-4 border-cyan-500 bg-gray-100 text-slate-900 dark:bg-slate-500 dark:text-slate-200'
        : 'border-transparent text-slate-500 dark:text-white',
      'group flex gap-x-2 border-s-4 py-2 pl-1 leading-6 hover:bg-slate-100  hover:text-slate-900 hover:dark:bg-slate-500 hover:dark:text-slate-200',
    ]"
  >
    <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
    {{ item.label }}
  </Link>
  <Disclosure v-else v-slot="{ open }" :default-open="hasActiveChild">
    <DisclosureButton
      class="group flex w-full items-center gap-x-2 px-2 py-2 text-left leading-6 text-slate-500 hover:bg-slate-100 hover:text-slate-900 dark:text-white hover:dark:bg-slate-500 hover:dark:text-slate-200"
    >
      <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
      <span class="flex-1">{{ item.label }}</span>
      <ChevronDownIcon
        :class="['h-5 w-5 shrink-0 transition', open ? '-rotate-180' : '']"
      />
    </DisclosureButton>
    <DisclosurePanel class="py-0.5">
      <li v-for="child in item.children" :key="child.label">
        <Link
          :href="child.href"
          :class="[
            child.current
              ? 'border-cyan-500 bg-gray-100 text-slate-900 dark:bg-slate-500 dark:text-slate-200'
              : 'border-transparent text-slate-500 dark:text-white',
            'flex border-s-4 py-1 pl-5 text-sm leading-6 hover:bg-slate-100 hover:text-slate-900 hover:dark:bg-slate-500 hover:dark:text-slate-200',
          ]"
        >
          {{ child.label }}
        </Link>
      </li>
    </DisclosurePanel>
  </Disclosure>
</template>
