<script setup>
import LikeGameMenuItem from "@/Navigations/LikeGameMenuItem.vue";
import SpinCircle from "@/Components/NFSUBrandTrivia/SpinCircle.vue";
</script>

<template>
  <div>
    <div class="flex items-center justify-end">
      <SpinCircle :pulseDuration="3" :rotateDuration="3" />
      <SpinCircle :pulseDuration="1.3" opacityValues="0.2;1;0.2" />
      <SpinCircle
        :pulseDuration="1.8"
        :rotateDuration="2.7"
        opacityValues="0.5;0.9;0.5"
      />
      <SpinCircle :rotateDuration="2.8" opacityValues="0.3;1;0.3" />
    </div>
    <div class="my-3 flex justify-end">
      <h3
        class="font-sans text-4xl uppercase italic tracking-wider text-sky-500 dark:text-sky-300"
      >
        Main Menu
      </h3>
    </div>
    <div class="flex justify-end">
      <nav class="space-y-2">
        <LikeGameMenuItem href="competitions">Competitions</LikeGameMenuItem>
        <LikeGameMenuItem href="tourneys">Tourneys</LikeGameMenuItem>
        <LikeGameMenuItem href="standings">Standings</LikeGameMenuItem>
        <LikeGameMenuItem href="game-server">Game Server</LikeGameMenuItem>
      </nav>
    </div>
  </div>
</template>
