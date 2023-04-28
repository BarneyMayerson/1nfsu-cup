<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import BaseDropdownMenu from "@/Components/Shared/Dropdown/BaseDropdownMenu.vue";
import Avatar from "@/Components/User/Avatar.vue";
import { route } from "momentum-trail";

const authUser = computed(() => usePage().props.auth.user);

const menu = [
  [
    { title: "Your profile", href: "#" },
    { title: "Settings", href: route("settings.profile.edit") },
  ],
  [{ title: "Logout", href: route("logout"), method: "post", as: "button" }],
];
</script>

<template>
  <BaseDropdownMenu :items="menu">
    <template #menuButtonTitle>
      <span class="h-10 w-10">
        <Avatar :src="authUser.avatar" />
      </span>
    </template>
  </BaseDropdownMenu>
</template>
