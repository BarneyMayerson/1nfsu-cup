<script setup>
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import Dropdown from "@/Components/Shared/Dropdown/Dropdown.vue";
import DropdownItemsGroup from "@/Components/Shared/Dropdown/DropdownItemsGroup.vue";
import DropdownItem from "@/Components/Shared/Dropdown/DropdownItem.vue";
import Avatar from "@/Components/User/Avatar.vue";
import LikeGameNav from "@/Navigations/LikeGameNav.vue";
import Bars3Icon from "@/Components/Shared/Icons/Bars3Icon.vue";
import XMarkIcon from "@/Components/Shared/Icons/XMarkIcon.vue";

const authUser = computed(() => usePage().props.auth.user);
</script>

<template>
  <Head title="Home" />
  <main class="container mx-auto">
    <div class="relative">
      <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-x-8">
        <div class="pt-4 lg:col-span-8 lg:px-0 lg:pt-12 xl:col-span-9">
          <div class="relative mx-auto lg:mx-0">
            <div class="border border-sky-400 shadow-lg dark:border-sky-800">
              <img
                :src="`/storage/static/grand-station.webp`"
                alt="Grand Station"
                class="brightness-150 saturate-50 dark:brightness-100 dark:saturate-100"
              />
            </div>
            <div
              class="mt-6 px-4 text-sky-300 dark:text-sky-400 md:absolute md:bottom-20 md:mt-0 lg:bottom-24 lg:px-8 xl:bottom-28"
            >
              <h1
                class="text-2xl font-bold tracking-tight md:text-3xl lg:text-4xl xl:text-5xl"
              >
                Communication, competitions and tourneys for those who love
                NFS&nbsp;Underground
              </h1>
            </div>
            <p
              class="mt-6 px-4 text-base sm:text-lg md:text-xl lg:px-8 lg:text-2xl xl:text-3xl"
            >
              If it is important to you, you will find a way. If not, you’ll
              find an excuse.
            </p>
          </div>
        </div>
        <div
          class="mt-8 lg:col-span-4 lg:mr-4 xl:absolute xl:inset-0 xl:left-2/3 xl:mr-0 xl:mt-24"
        >
          <LikeGameNav />
        </div>
      </div>
    </div>
    <div class="mt-8 flex items-center space-x-4">
      <Bars3Icon class="h-20 w-20" />
      <XMarkIcon class="h-20 w-20" />
      <Dropdown>
        <div
          class="inline-flex w-full items-center rounded-md bg-transparent px-1"
        >
          <span class="inline-block h-12 w-12">
            <Avatar :src="authUser.avatar" />
          </span>
          <svg
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="-mr-1 ml-2 h-5 w-5 text-gray-700 transition hover:opacity-75 dark:text-gray-200"
            aria-hidden="true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 8.25l-7.5 7.5-7.5-7.5"
            />
          </svg>
        </div>

        <template #items>
          <DropdownItemsGroup label="Basic action">
            <DropdownItem href="#">Your profile</DropdownItem>
            <DropdownItem :as="Link" :href="route('settings.profile.edit')">
              Settings
            </DropdownItem>
          </DropdownItemsGroup>

          <DropdownItemsGroup>
            <DropdownItem as="button" :href="route('logout')">
              Logout
            </DropdownItem>
          </DropdownItemsGroup>
        </template>
      </Dropdown>
    </div>
  </main>
</template>
