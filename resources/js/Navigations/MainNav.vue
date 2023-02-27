<script setup>
import MainNavItem from "@/Navigations/MainNavItem.vue";
</script>
<template>
  <nav aria-label="Site Nav">
    <ul class="flex items-center gap-6 text-sm">
      <li>
        <MainNavItem href="#">Competitions</MainNavItem>
      </li>
      <li>
        <MainNavItem href="#">Tourneys</MainNavItem>
      </li>
      <li>
        <MainNavItem href="#">Season Standings</MainNavItem>
      </li>
      <li>
        <MainNavItem href="#">Game Server</MainNavItem>
      </li>
    </ul>
  </nav>
</template>
