<script setup>
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";
import LikeGameNav from "@/Navigations/LikeGameNav.vue";
import CountrySelect from "@/Components/CountrySelector/CountrySelect.vue";

const imgNotFoundClasses = ref("");
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
                @error="imgNotFoundClasses = 'h-[60vh]'"
                @load="imgNotFoundClasses = ''"
                alt="Grand Station"
                class="brightness-150 saturate-50 dark:brightness-100 dark:saturate-100"
                :class="imgNotFoundClasses"
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
              If it is important to you, you will find a way. If not, you'll
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
      <div class="mt-8">
        <div class="w-96">
          <CountrySelect />
        </div>
      </div>
    </div>
  </main>
</template>
