<script setup>
import { inject } from "vue";
import { Head } from "@inertiajs/vue3";

const user = inject("authUser", null);
</script>

<template>
  <Head title="Your profile" />

  <div class="container mx-auto">
    <h2 class="text-2xl font-semibold">Your cabinet</h2>
    <div
      class="-mx-4 mt-4 flex flex-col gap-4 rounded border border-gray-600/10 bg-gray-100 px-4 py-6 dark:border-gray-600/50 dark:bg-gray-900/90 dark:bg-sky-900 md:flex-row md:gap-6"
    >
      <div
        class="rounded-lg md:basis-1/3 lg:basis-1/4 xl:basis-1/5 2xl:basis-1/6"
      >
        The Cabinet Menu
      </div>
      <main class="grow">The remaining stuff</main>
    </div>
  </div>
</template>
