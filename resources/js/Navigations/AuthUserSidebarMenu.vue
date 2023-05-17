<script setup>
import UserIcon from "@/Components/Shared/Icons/UserIcon.vue";
import VerticalNavItem from "@/Components/Nav/VerticalNavItem.vue";

const navItems = [
  {
    label: "Public profile",
    href: "#",
    icon: UserIcon,
    current: false,
    children: [],
  },
  {
    label: "Projects",
    href: "#",
    icon: UserIcon,
    current: false,
    children: [
      {
        label: "All",
        href: "#",
        current: false,
      },
      {
        label: "New project",
        href: "#",
        current: false,
      },
    ],
  },
  {
    label: "Calendar",
    href: "#",
    icon: UserIcon,
    current: false,
    children: [
      {
        label: "Year",
        href: "#",
        current: false,
      },
      {
        label: "Month",
        href: "#",
        current: true,
      },
      {
        label: "Week",
        href: "#",
        current: false,
      },
    ],
  },
  {
    label: "Documents",
    href: "#",
    icon: UserIcon,
    current: false,
    children: [],
  },
];
</script>
<template>
  <nav>
    <ul role="list" class="space-y-1">
      <li v-for="item in navItems" :key="item.label">
        <VerticalNavItem :item="item" />
      </li>
    </ul>
  </nav>
</template>
