<script setup>
import { route } from "momentum-trail";
import Square2x2Icon from "@/Components/Shared/Icons/Square2x2Icon.vue";
import FlagIcon from "@/Components/Shared/Icons/FlagIcon.vue";
import GearIcon from "@/Components/Shared/Icons/GearIcon.vue";
import VerticalNavItem from "@/Components/Nav/VerticalNavItem.vue";

const navItems = [
  {
    label: "Overall Info",
    href: route("cabinet.index"),
    icon: Square2x2Icon,
    current: route().current("cabinet.index"),
    children: [],
  },
  {
    label: "Tourneys",
    href: route("cabinet.tourneys.index"),
    icon: FlagIcon,
    current: route().current("cabinet.tourneys.*"),
    children: [],
  },
];
</script>
<template>
  <nav class="border-b pb-4 md:border-b-0 md:pb-0">
    <ul role="list" class="space-y-1">
      <li v-for="item in navItems" :key="item.label">
        <VerticalNavItem :item="item" />
      </li>
    </ul>
  </nav>
</template>
