<script setup>
import Header from "@/Components/Header.vue";
</script>

<template>
  <div
    class="sticky top-0 z-40 w-full flex-none bg-white/95 backdrop-blur transition-colors duration-500 supports-[backdrop-filter]:bg-white/50 dark:border-slate-50/[0.06] dark:bg-transparent lg:z-50 lg:border-b lg:border-slate-900/10"
  >
    <Header />
  </div>
  <main class="px-8 py-6">
    <slot />
  </main>
  <footer class="px-8 py-6">Footer goes gere...</footer>
</template>
