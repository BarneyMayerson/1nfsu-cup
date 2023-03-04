<script setup>
import { Head } from "@inertiajs/vue3";
import LikeGameNav from "@/Navigations/LikeGameNav.vue";
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
    <div class="mt-8 flex justify-end">
      <LikeGameNav />
    </div>
  </main>
</template>
