<script setup>
import { route } from "momentum-trail";
import GenericMenuItem from "@/Navigations/GenericMenuItem.vue";
</script>

<template>
  <div class="mt-4">
    <GenericMenuItem :href="route('register')">Register</GenericMenuItem>
  </div>
</template>
