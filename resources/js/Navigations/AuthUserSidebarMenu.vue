<script setup>
import VerticalNavItem from "@/Components/Nav/VerticalNavItem.vue";
import UserIcon from "@/Components/Shared/Icons/UserIcon.vue";

const navItems = [
  {
    label: "Public profile",
    href: "#",
    icon: UserIcon,
    current: false,
    depth: 0,
    children: [],
  },
  {
    label: "Projects",
    href: "#",
    icon: UserIcon,
    current: true,
    depth: 0,
    children: [
      {
        label: "All",
        href: "#",
        icon: UserIcon,
        current: false,
        depth: 1,
        children: [],
      },
      {
        label: "New project",
        href: "#",
        icon: UserIcon,
        current: true,
        depth: 1,
        children: [],
      },
    ],
  },
  {
    label: "Calendar",
    href: "#",
    icon: UserIcon,
    current: false,
    depth: 0,
    children: [
      {
        label: "Year",
        href: "#",
        icon: UserIcon,
        current: false,
        depth: 1,
        children: [],
      },
      {
        label: "Month",
        href: "#",
        icon: UserIcon,
        current: false,
        depth: 1,
        children: [],
      },
      {
        label: "Week",
        href: "#",
        icon: UserIcon,
        current: false,
        depth: 1,
        children: [
          {
            label: "Per day",
            href: "#",
            icon: UserIcon,
            current: true,
            depth: 2,
            children: [],
          },
        ],
      },
    ],
  },
  {
    label: "Documents",
    href: "#",
    icon: UserIcon,
    current: false,
    depth: 0,
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
