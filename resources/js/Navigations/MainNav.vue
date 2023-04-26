<script setup>
import { route } from "momentum-trail";
import GenericMenuItem from "@/Components/Nav/GenericMenuItem.vue";

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
        props.vertical ? 'flex-col items-start gap-4' : 'items-center gap-6',
      ]"
    >
      <li>
        <GenericMenuItem :href="route('competitions.index')">
          Competitions
        </GenericMenuItem>
      </li>
      <li>
        <GenericMenuItem :href="route('tourneys.index')">
          Tourneys
        </GenericMenuItem>
      </li>
      <li>
        <GenericMenuItem :href="route('standings.index')">
          Standings
        </GenericMenuItem>
      </li>
      <li>
        <GenericMenuItem :href="route('game-server.index')">
          Game Server
        </GenericMenuItem>
      </li>
    </ul>
  </nav>
</template>
