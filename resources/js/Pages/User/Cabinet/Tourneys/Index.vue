<script setup>
import { Head, Link } from "@inertiajs/vue3";
import CabinetSidebarMenu from "@/Navigations/CabinetSidebarMenu.vue";
import { route } from "momentum-trail";
import Button from "@/Components/Shared/Button.vue";

defineProps(["tourneys"]);
</script>

<template>
  <Head title="Your tourneys" />
  <div class="container mx-auto">
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-semibold">Cabinet :: Your tourneys</h2>
      <Link :href="route('cabinet.tourneys.create')" as="button">
        <Button>Create Tourney</Button>
      </Link>
    </div>
    <div
      class="-mx-4 mt-4 flex flex-col gap-4 rounded border border-gray-600/10 bg-gray-100 px-4 py-6 dark:border-gray-600/50 dark:bg-gray-900/90 dark:bg-sky-900 md:flex-row md:gap-6"
    >
      <div
        class="rounded-lg md:basis-1/3 lg:basis-1/4 xl:basis-1/5 2xl:basis-1/6"
      >
        <CabinetSidebarMenu />
      </div>
      <main class="grow">
        <div>
          Play with Image
          <div class="flex items-center">
            <div class="inline-flex h-64 w-96 border"></div>
            <p>Tourney Name</p>
          </div>
        </div>
        <ul v-if="tourneys">
          <li
            v-for="tourney in tourneys"
            :key="tourney.id"
            class="flex items-center"
          >
            <p>{{ tourney.name }}</p>
          </li>
        </ul>
        <div v-else>
          <p>There are no tourneys yet.</p>
        </div>
      </main>
    </div>
  </div>
</template>
