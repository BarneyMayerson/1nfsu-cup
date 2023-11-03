<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import AuthUserTopSection from "@/Components/User/AuthUserTopSection.vue";
import AuthUserSidebarMenu from "@/Navigations/AuthUserSidebarMenu.vue";
import Button from "@/Components/Shared/Button.vue";

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
      <main class="grow">
        <div class="border-b border-gray-300 pb-2 dark:border-gray-500">
          <h2 class="text-xl font-semibold">Change email</h2>
        </div>
        <div class="mt-6">
          <p class="mb-3">
            Changing your email can have unintended side effects.
          </p>
          <Link :href="route('settings.account.email.edit')" as="button">
            <Button intent="warning">Change email ...</Button>
          </Link>
        </div>

        <div class="mt-10 border-b border-gray-300 pb-2 dark:border-gray-500">
          <h2 class="text-xl font-semibold">Change name</h2>
        </div>
        <div class="mt-6">
          <p class="mb-3">Changing your name will have certain side effects.</p>
          <Link :href="route('settings.account.name.edit')" as="button">
            <Button>Change name ...</Button>
          </Link>
        </div>

        <div class="mt-10 border-b border-gray-300 pb-2 dark:border-gray-500">
          <h2 class="text-xl font-semibold">Change password</h2>
        </div>
        <div class="mt-6">
          <p class="mb-3">
            Changing your password will not have certain side effects. Just
            memorize about it.
          </p>
          <Link :href="route('settings.account.password.edit')" as="button">
            <Button>Change password ...</Button>
          </Link>
        </div>
      </main>
    </div>
  </div>
</template>
