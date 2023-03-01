<script setup>
import AppLogo from "@/Components/AppLogo.vue";
import ToggleMode from "@/Components/ToggleMode.vue";
import MainNav from "@/Navigations/MainNav.vue";
</script>

<template>
  <header aria-label="Site Header">
    <div class="container mx-auto">
      <div class="flex h-16 items-center justify-between">
        <div class="md:flex md:items-center md:gap-12">
          <a class="block" href="/">
            <span class="sr-only">Home</span>
            <AppLogo class="h-10 w-full" />
          </a>
        </div>

        <div class="hidden md:block">
          <MainNav />
        </div>

        <div class="flex items-center gap-4">
          <div class="sm:flex sm:gap-4">
            <ToggleMode />
          </div>
          <div class="sm:flex sm:gap-4">
            <a
              class="rounded-md bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white shadow dark:hover:bg-emerald-500"
              href="/"
            >
              Login
            </a>

            <div class="hidden sm:flex">
              <a
                class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-emerald-600 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
                href="/"
              >
                Register
              </a>
            </div>
          </div>

          <div class="block md:hidden">
            <button
              class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
