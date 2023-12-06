<script setup>
import { Head } from "@inertiajs/vue3";
import CabinetSidebarMenu from "@/Navigations/CabinetSidebarMenu.vue";
</script>

<template>
  <Head title="Your tourneys" />
  <div class="container mx-auto">
    <h2 class="text-2xl font-semibold">Cabinet :: Your tourneys</h2>
    <div
      class="-mx-4 mt-4 flex flex-col gap-4 rounded border border-gray-600/10 bg-gray-100 px-4 py-6 dark:border-gray-600/50 dark:bg-gray-900/90 dark:bg-sky-900 md:flex-row md:gap-6"
    >
      <div
        class="rounded-lg md:basis-1/3 lg:basis-1/4 xl:basis-1/5 2xl:basis-1/6"
      >
        <CabinetSidebarMenu />
      </div>
      <main class="grow">Tourney index page goes here..</main>
    </div>
  </div>
</template>
