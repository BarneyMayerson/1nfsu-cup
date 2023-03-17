<script setup>
import MainNavItem from "@/Navigations/MainNavItem.vue";
</script>
<template>
  <nav aria-label="Site Nav">
    <ul class="flex items-center gap-6 text-sm">
      <li>
        <MainNavItem href="competitions">Competitions</MainNavItem>
      </li>
      <li>
        <MainNavItem href="tourneys">Tourneys</MainNavItem>
      </li>
      <li>
        <MainNavItem href="standings">Standings</MainNavItem>
      </li>
      <li>
        <MainNavItem href="game-server">Game Server</MainNavItem>
      </li>
    </ul>
  </nav>
</template>
