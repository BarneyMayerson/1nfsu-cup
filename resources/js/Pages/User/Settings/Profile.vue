<script setup>
import { Head } from "@inertiajs/vue3";
import AuthUserTopSection from "@/Components/User/AuthUserTopSection.vue";
import AuthUserSidebarMenu from "@/Navigations/AuthUserSidebarMenu.vue";
import ProfileForm from "@/Forms/User/Settings/ProfileForm.vue";
import AvatarForm from "@/Forms/User/Settings/AvatarForm.vue";

const props = defineProps({
  user: Object,
});
</script>

<template>
  <Head title="Your profile" />
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
      <main class="grow">
        <div class="border-b border-gray-300 pb-2 dark:border-gray-500">
          <h2 class="text-xl font-semibold">Public profile</h2>
        </div>
        <div class="mt-3 flex shrink-0 flex-col gap-4 md:mt-6 md:flex-row">
          <div class="py-6 md:basis-3/4">
            <ProfileForm :user="props.user" />
          </div>
          <div class="md:basis-1/4">
            <AvatarForm :user="props.user" />
          </div>
        </div>
      </main>
    </div>
  </div>
</template>
