<script setup>
import { route } from "momentum-trail";
import UserIcon from "@/Components/Shared/Icons/UserIcon.vue";
import GearIcon from "@/Components/Shared/Icons/GearIcon.vue";
import BellIcon from "@/Components/Shared/Icons/BellIcon.vue";
import VerticalNavItem from "@/Components/Nav/VerticalNavItem.vue";

const navItems = [
  {
    label: "Public profile",
    href: route("settings.profile.edit"),
    icon: UserIcon,
    current: route().current("settings.profile.edit"),
    children: [],
  },
  {
    label: "Account",
    href: route("settings.account.edit"),
    icon: GearIcon,
    current: route().current("settings.account.edit"),
    children: [],
  },
  {
    label: "Notifications",
    href: "#",
    icon: BellIcon,
    current: false,
    children: [
      {
        label: "Browser",
        href: route("settings.notifications.editBrowser"),
        current: route().current("settings.notifications.editBrowser"),
      },
      {
        label: "Email",
        href: route("settings.notifications.editEmail"),
        current: route().current("settings.notifications.editEmail"),
      },
    ],
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
