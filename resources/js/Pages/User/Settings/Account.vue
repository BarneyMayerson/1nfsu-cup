<script setup>
import { Head } from "@inertiajs/vue3";
import AuthUserTopSection from "@/Components/User/AuthUserTopSection.vue";
import AuthUserSidebarMenu from "@/Navigations/AuthUserSidebarMenu.vue";

const props = defineProps({
  user: Object,
});
</script>

<template>
  <Head title="Account settings" />
  <div class="container mx-auto">
    <AuthUserTopSection :user="props.user" />

    <div
      class="-mx-4 mt-4 flex flex-col gap-4 rounded border border-gray-600/10 bg-gray-100 px-4 py-6 dark:border-gray-600/50 dark:bg-gray-900/90 dark:bg-sky-900 md:flex-row md:gap-6"
    >
      <div
        class="rounded-lg md:basis-1/3 lg:basis-1/4 xl:basis-1/5 2xl:basis-1/6"
      >
        <AuthUserSidebarMenu />
      </div>
      <main class="grow rounded-lg">Account Settings page goes here</main>
    </div>
  </div>
</template>
