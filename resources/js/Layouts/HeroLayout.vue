<script setup>
import AppLogo from "@/Components/AppLogo.vue";
import ToggleMode from "@/Components/ToggleMode.vue";
import Footer from "@/Components/Footer.vue";
</script>

<template>
  <div
    class="sticky top-0 z-40 w-full flex-none bg-white/95 backdrop-blur transition-colors duration-500 supports-[backdrop-filter]:bg-white/50 dark:border-slate-50/[0.06] dark:bg-transparent md:border-b md:border-slate-900/10 dark:md:border-slate-100/50 lg:z-50"
  >
    <header aria-label="Site Header">
      <div class="container mx-auto">
        <div class="flex h-16 items-center justify-between">
          <div class="md:flex md:items-center md:gap-12">
            <a class="block" href="/">
              <span class="sr-only">Home</span>
              <AppLogo class="h-10 w-full" />
            </a>
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
  </div>
  <main class="px-8 py-6">
    <slot />
  </main>
  <div
    class="mt-8 bg-white/95 py-12 backdrop-blur transition-colors duration-500 supports-[backdrop-filter]:bg-white/50 dark:border-slate-50/[0.06] dark:bg-transparent md:border-t md:border-slate-900/10 dark:md:border-slate-100/50"
  >
    <Footer />
  </div>
</template>
