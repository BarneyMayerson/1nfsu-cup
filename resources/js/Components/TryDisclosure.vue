<script setup>
import { computed } from "vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { usePage } from "@inertiajs/vue3";
import LogoSubmenu from "@/Navigations/LogoSubmenu.vue";
import MainNav from "@/Navigations/MainNav.vue";
import AuthUserDropdownMenu from "@/Navigations/AuthUserDropdownMenu.vue";
import GuestSubmenu from "@/Navigations/GuestSubmenu.vue";
import AuthMobileMenu from "@/Navigations/AuthMobileMenu.vue";
import GuestMobileMenu from "@/Navigations/GuestMobileMenu.vue";
import ToggleMode from "@/Components/ToggleMode.vue";
import XMarkIcon from "@/Components/Shared/Icons/XMarkIcon.vue";
import Bars3Icon from "@/Components/Shared/Icons/Bars3Icon.vue";

const currentUser = computed(() => usePage().props.auth.user);
const isAuth = computed(() => Boolean(currentUser.value));
const isHome = computed(() => usePage().props.isHome);
</script>

<template>
  <Disclosure v-slot="{ open }" as="nav">
    <div class="flex h-16 items-center justify-between">
      <LogoSubmenu />

      <div v-if="!isHome" class="hidden md:block">
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
          <GuestSubmenu />
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
      <MainNav :vertical="true" class="px-4" />
      <div v-if="isAuth" class="px-4">
        <AuthMobileMenu />
      </div>
      <div v-else class="px-4">
        <GuestMobileMenu />
      </div>
    </DisclosurePanel>
  </Disclosure>
</template>
