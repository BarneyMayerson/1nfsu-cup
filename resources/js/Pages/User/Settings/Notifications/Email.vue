<script setup>
import { Head } from "@inertiajs/vue3";
import AuthUserTopSection from "@/Components/User/AuthUserTopSection.vue";
import AuthUserSidebarMenu from "@/Navigations/AuthUserSidebarMenu.vue";
</script>

<template>
  <Head title="Email notifications" />
  <div class="container mx-auto">
    <AuthUserTopSection />

    <div
      class="-mx-4 mt-4 flex flex-col gap-4 border border-gray-600/10 bg-white/90 px-4 py-6 dark:border-gray-600/50 dark:bg-gray-900/90 md:flex-row md:gap-6"
    >
      <div
        class="rounded-lg md:basis-1/3 lg:basis-1/4 xl:basis-1/5 2xl:basis-1/6"
      >
        <AuthUserSidebarMenu />
      </div>
      <main class="grow rounded-lg">
        Notifications via email page goes here
      </main>
    </div>
  </div>
</template>
