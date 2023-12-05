<script setup>
import { computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import Avatar from "@/Components/User/Avatar.vue";
import Dropdown from "@/Components/Shared/Dropdown/Dropdown.vue";
import DropdownItemsGroup from "@/Components/Shared/Dropdown/DropdownItemsGroup.vue";
import DropdownItem from "@/Components/Shared/Dropdown/DropdownItem.vue";

const authUser = computed(() => usePage().props.auth.user);
</script>

<template>
  <Dropdown>
    <div class="inline-flex w-full items-center rounded-md bg-transparent px-1">
      <span class="inline-block h-10 w-10">
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
        <DropdownItem
          :is="Link"
          :href="route('public-profile', authUser.merged_name)"
        >
          Your profile
        </DropdownItem>
        <DropdownItem :is="Link" :href="route('settings.profile.edit')">
          Settings
        </DropdownItem>
        <DropdownItem :is="Link" :href="route('cabinet.index')">
          Cabinet
        </DropdownItem>
      </DropdownItemsGroup>

      <DropdownItemsGroup>
        <DropdownItem
          :is="Link"
          as="button"
          method="post"
          :href="route('logout')"
          description="Log out your account"
        >
          Logout
        </DropdownItem>
      </DropdownItemsGroup>
    </template>
  </Dropdown>
</template>
