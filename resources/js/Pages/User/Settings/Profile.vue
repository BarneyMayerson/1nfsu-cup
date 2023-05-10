<script setup>
import { Head } from "@inertiajs/vue3";
import AuthUserTopSection from "@/Components/User/AuthUserTopSection.vue";

const navItems = [
  { label: "Public profile", href: "#", icon: "#", current: true },
  { label: "Account", href: "#", icon: "#", current: false },
];
</script>

<template>
  <Head title="Your Profile" />
  <AuthUserTopSection />
  <div
    class="mt-4 flex flex-col gap-4 border border-blue-300 p-1 md:flex-row md:gap-6"
  >
    <div
      class="flex flex-col gap-y-5 border border-green-300 p-1 md:basis-1/3 lg:basis-1/4 xl:basis-1/5 2xl:basis-1/6"
    >
      <div class="">Sidebar</div>
      <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
          <li>
            <ul role="list" class="space-y-1">
              <li v-for="item in navItems" :key="item.label">
                <a
                  :href="item.href"
                  :class="[
                    item.current
                      ? 'bg-gray-800 text-white'
                      : 'text-gray-400 hover:bg-gray-800 hover:text-white',
                    'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6',
                  ]"
                >
                  {{ item.label }}
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <main class="grow border border-emerald-300 p-1">Main</main>
  </div>
</template>
