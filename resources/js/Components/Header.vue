<script setup>
import { onMounted, onUpdated, ref } from "vue";
import { route } from "momentum-trail";
import TryDisclosure from "@/Components/TryDisclosure.vue";

const isHomePage = ref();

onMounted(() => {
  isHomePage.value = route().current("home");
});

onUpdated(() => {
  isHomePage.value = route().current("home");
});
</script>

<template>
  <header aria-label="Site Header">
    <div class="container mx-auto">
      <TryDisclosure />
    </div>
  </header>
</template>
