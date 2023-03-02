<script setup>
import { Head } from "@inertiajs/vue3";
import LikeGameMenuItem from "@/Navigations/LikeGameMenuItem.vue";
</script>

<script>
import HeroLayout from "@/Layouts/HeroLayout.vue";

export default {
  layout: HeroLayout,
};
</script>

<template>
  <Head title="Home" />
  <main class="container mx-auto">
    <div class="mt-8 px-4">Main content goes here...</div>

    <div class="mt-8">
      <LikeGameMenuItem>Tourneys</LikeGameMenuItem>
    </div>

    <div class="mt-8 grid h-96 place-items-center border border-green-300">
      #1
    </div>
    <div class="mt-8 h-96 border border-green-300">#2</div>
    <div class="mt-8 h-96 border border-green-300">#3</div>
    <div class="mt-8 h-96 border border-green-300">#4</div>
  </main>
</template>
