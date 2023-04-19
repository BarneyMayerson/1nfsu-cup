<template>
  <Disclosure v-slot="{ open }" as="nav">
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

          <div class="hidden md:flex">
            <Link
              class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-emerald-600 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
              :href="route('register')"
              as="button"
            >
              Register
            </Link>
          </div>
        </div>

        <div class="block">
          <DisclosureButton
            class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
          >
            <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
            <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
          </DisclosureButton>
        </div>
      </div>
    </div>

    <DisclosurePanel class="space-y-4 divide-y rounded-lg border py-4">
      <nav class="flex flex-col space-y-2 px-4">
        <Link
          class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
          :href="route('competitions.index')"
        >
          Competitions
        </Link>
        <Link
          class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
          :href="route('tourneys.index')"
        >
          Tourneys
        </Link>
        <Link
          class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
          :href="route('standings.index')"
        >
          Standings
        </Link>
        <Link
          class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
          :href="route('game-server.index')"
        >
          Game Server
        </Link>
      </nav>
      <div v-if="isAuth" class="px-4">
        <div class="mt-4 flex items-center">
          <div class="h-10 w-10 flex-shrink-0">
            <Avatar :src="currentUser.avatar" />
          </div>
          <div class="ml-4">
            <div class="text-base font-medium">Tom Cook</div>
            <div class="text-sm font-medium">tom@example.com</div>
          </div>
          <button
            type="button"
            class="ml-auto flex-shrink-0 rounded-full p-1 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-200"
          >
            <span class="sr-only">View notifications</span>
            <BellIcon class="h-8 w-8" aria-hidden="true" />
          </button>
        </div>
        <div class="mt-3 flex flex-col items-start space-y-1">
          <Link
            class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
            href="#"
          >
            Your Profile
          </Link>
          <Link
            class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
            href="#"
          >
            Settings
          </Link>
          <Link
            class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
            :href="route('logout')"
            method="post"
            as="button"
          >
            Logout
          </Link>
        </div>
      </div>
      <div v-else class="px-4">
        <div class="mt-4">
          <Link
            class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
            :href="route('register')"
          >
            Register
          </Link>
        </div>
      </div>
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
import Avatar from "@/Components/User/Avatar.vue";
import XMarkIcon from "@/Components/Shared/Icons/XMarkIcon.vue";
import Bars3Icon from "@/Components/Shared/Icons/Bars3Icon.vue";
import BellIcon from "@/Components/Shared/Icons/BellIcon.vue";

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
