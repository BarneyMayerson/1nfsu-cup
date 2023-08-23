<script setup>
import { computed } from "vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { usePage } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import GenericMenuItem from "@/Components/Nav/GenericMenuItem.vue";
import LogoSubmenu from "@/Navigations/LogoSubmenu.vue";
import MainNav from "@/Navigations/MainNav.vue";
import AuthUserDropdownMenu from "@/Navigations/AuthUserDropdownMenu.vue";
import GuestSubmenu from "@/Navigations/GuestSubmenu.vue";
import ToggleMode from "@/Components/ToggleMode.vue";
import XMarkIcon from "@/Components/Shared/Icons/XMarkIcon.vue";
import Bars3Icon from "@/Components/Shared/Icons/Bars3Icon.vue";
import BellIcon from "@/Components/Shared/Icons/BellIcon.vue";
import Avatar from "@/Components/User/Avatar.vue";
import mainMenuItems from "@/menus/mainMenuItems";

const currentUser = computed(() => usePage().props.auth.user);
const isAuth = computed(() => Boolean(currentUser.value));
const isHome = computed(() => usePage().props.isHome);
</script>

<template>
  <header aria-label="Site Header">
    <div class="container mx-auto">
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

            <div class="block md:hidden">
              <DisclosureButton
                class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
              >
                <Bars3Icon
                  v-if="!open"
                  class="block h-6 w-6"
                  aria-hidden="true"
                />
                <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
              </DisclosureButton>
            </div>
          </div>
        </div>

        <DisclosurePanel
          class="block space-y-4 divide-y rounded-lg border py-4 md:hidden"
          v-slot="{ close }"
        >
          <nav aria-label="Site Nav" class="px-4">
            <ul class="flex flex-col items-start gap-3">
              <li v-for="item in mainMenuItems" :key="item.label">
                <GenericMenuItem @click="close()" :href="item.href">
                  {{ item.label }}
                </GenericMenuItem>
              </li>
            </ul>
          </nav>

          <div v-if="isAuth" class="px-4">
            <div class="mt-4 flex items-center">
              <div class="h-10 w-10 flex-shrink-0">
                <Avatar :src="currentUser.avatar" />
              </div>
              <div class="ml-4">
                <div class="text-base font-medium">{{ currentUser.name }}</div>
                <div class="text-sm font-medium">{{ currentUser.email }}</div>
              </div>
              <button
                type="button"
                class="ml-auto flex-shrink-0 rounded-full p-1 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-200"
              >
                <span class="sr-only">View notifications</span>
                <BellIcon class="h-8 w-8" aria-hidden="true" />
              </button>
            </div>
            <div class="mt-3 flex flex-col items-start gap-2">
              <GenericMenuItem
                @click="close()"
                :href="route('public-profile', currentUser.merged_name)"
              >
                Your Profile
              </GenericMenuItem>
              <GenericMenuItem
                @click="close()"
                :href="route('settings.account.edit')"
                >Settings</GenericMenuItem
              >
              <GenericMenuItem
                @click="close()"
                :href="route('logout')"
                method="post"
                as="button"
              >
                Logout
              </GenericMenuItem>
            </div>
          </div>
          <div v-else class="px-4">
            <div class="mt-4">
              <GenericMenuItem @click="close()" :href="route('register')">
                Register
              </GenericMenuItem>
            </div>
          </div>
        </DisclosurePanel>
      </Disclosure>
    </div>
  </header>
</template>
