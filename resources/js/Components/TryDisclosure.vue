<template>
  <Disclosure v-slot="{ open }" as="nav" class="border border-purple-200">
    <div class="flex h-16 items-center justify-between">
      <div class="md:flex md:items-center md:gap-12">
        <Link class="block" :href="route('home')">
          <span class="sr-only">Home</span>
          <AppLogo class="h-10 w-full" />
        </Link>
      </div>

      <div v-if="!isHomePage" class="hidden md:block">
        <MainNav />
      </div>

      <div class="flex items-center gap-4">
        <div class="sm:flex sm:gap-4">
          <ToggleMode />
        </div>

        <div v-if="isAuth" class="hidden md:flex md:gap-4">
          <AuthUserDropdownMenu />
        </div>
        <div v-else class="sm:flex sm:gap-4">
          <Link
            class="rounded-md bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white shadow dark:hover:bg-emerald-500"
            :href="route('login')"
            as="button"
          >
            Login
          </Link>

          <div class="hidden sm:flex">
            <Link
              class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-emerald-600 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
              :href="route('register')"
              as="button"
            >
              Register
            </Link>
          </div>
        </div>

        <div class="block md:hidden">
          <DisclosureButton
            class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
          >
            <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
            <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
          </DisclosureButton>
        </div>
      </div>
    </div>

    <DisclosurePanel class="px-4 pb-2 pt-4">
      If you're unhappy with your purchase for any reason, email us within 90
      days and we'll refund you in full, no questions asked.
    </DisclosurePanel>
  </Disclosure>
</template>

<script setup>
import { ref, computed, onMounted, onUpdated } from "vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { Link, usePage } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import AppLogo from "@/Components/AppLogo.vue";
import MainNav from "@/Navigations/MainNav.vue";
import AuthUserDropdownMenu from "@/Navigations/AuthUserDropdownMenu.vue";
import ToggleMode from "@/Components/ToggleMode.vue";
import XMarkIcon from "@/Components/Shared/Icons/XMarkIcon.vue";
import Bars3Icon from "@/Components/Shared/Icons/Bars3Icon.vue";

const isHomePage = ref();

onMounted(() => {
  isHomePage.value = route().current("home");
});

onUpdated(() => {
  isHomePage.value = route().current("home");
});

const currentUser = computed(() => usePage().props.auth.user);
const isAuth = computed(() => Boolean(currentUser.value));
</script>
