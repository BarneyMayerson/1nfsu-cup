<script setup>
import { Head } from "@inertiajs/vue3";
import LikeGameMenuItem from "@/Navigations/LikeGameMenuItem.vue";
import SpinCircle from "@/Components/NFSUBrandTrivia/SpinCircle.vue";
</script>

<script>
import HeroLayout from "@/Layouts/HeroLayout.vue";

export default {
  layout: HeroLayout,
};
</script>

<template>
  <Head title="Home" />
  <main class="rota container mx-auto">
    <div class="mt-8 px-4">Main content goes here...</div>

    <div class="mt-8 flex items-center justify-start">
      <SpinCircle :pulseDuration="3" :rotateDuration="3" />
      <SpinCircle :pulseDuration="1.3" opacityValues="0.2;1;0.2" />
      <SpinCircle
        :pulseDuration="1.8"
        :rotateDuration="2.7"
        opacityValues="0.5;0.9;0.5"
      />
      <SpinCircle :rotateDuration="2.8" opacityValues="0.3;1;0.3" />
    </div>

    <div class="mt-8">
      <LikeGameMenuItem>Tourneys</LikeGameMenuItem>
      <LikeGameMenuItem>Competitions</LikeGameMenuItem>
      <LikeGameMenuItem>Standings</LikeGameMenuItem>
      <LikeGameMenuItem>Game Server</LikeGameMenuItem>
    </div>

    <div class="mt-8 grid h-96 place-items-center border border-green-300">
      #1
    </div>
    <div class="mt-8 h-96 border border-green-300">#2</div>
    <div class="mt-8 h-96 border border-green-300">#3</div>
    <div class="mt-8 h-96 border border-green-300">#4</div>
  </main>
</template>
