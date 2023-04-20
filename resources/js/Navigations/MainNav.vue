<script setup>
import MainNavItem from "@/Navigations/MainNavItem.vue";

const props = defineProps({
  vertical: {
    type: Boolean,
    default: false,
  },
});
</script>
<template>
  <nav aria-label="Site Nav">
    <ul
      :class="[
        'flex text-sm',
        props.vertical ? 'flex-col items-start gap-4' : ' items-center gap-6',
      ]"
    >
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
